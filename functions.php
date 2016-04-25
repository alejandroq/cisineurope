<?php 

/* 

CIS in Europe MVP 

Designer / Developer: Alejandro Quesada

*/

# 
#  Main Function
#
	 	
	// language selection if-statements 
	if (isset($_GET['spanish'])) {
		$currentLanguage = 'spanish';
		} else {
			$currentLanguage = 'english';
		}

	// global variables are calling functions to adhere results.
	$slideImgs = imgPrinting(); //print img's found on slideshow
	$text = primaryLanguage($currentLanguage); //allocate language resources appropriately
	$anonymousNotes = printAnonymousNotes($text); //print anon. notes
	$submitText = formValidation($text);
	$visitedCountries = printVisitedCountries();


# 
#  Function that dictates language of page based on user inputs
#

	function primaryLanguage($currentLanguage) {

		/*  require 'connection.php' calls and inserts the php code to connect your webpage 
            to your WIMP stack. Will be called several times throughout this php file in 
            different functions. You could also perform the following 'global $connection' 
            for the same effect. */
        require 'connection.php';

		// find row count for a loop
		$sql = "SELECT * FROM linguaFranca";
			$rs = odbc_exec($connection,$sql);
			odbc_fetch_row($rs);
			$rows = odbc_num_rows($rs); // returns number of rows from $sql results

		for ($i=1; $i <= $rows; $i++) { 
			
			$sql = "SELECT $currentLanguage FROM linguaFranca WHERE ID=$i";
				$rs = odbc_exec($connection,$sql);
				odbc_fetch_row($rs);
				$text[$i] = odbc_result($rs,$currentLanguage);

		}

		return $text;
	}


# 
#  Form Submission Validation
#
	
	function formValidation($text) {
		
			// if the 'submit button' is pressed perform operation.
			if(isset($_POST["submit"])) {

				// array initialization.
				$formComponents = ["cityName", "note"];

				// looping through an array in PHP are most easily excuted with a 'foreach' loop
				foreach ($formComponents as $val) {
				
					$answer = filter_input(INPUT_POST, $val, FILTER_SANITIZE_SPECIAL_CHARS);

					if ($answer=="") {
						return $text[22];
					}
				}

				// formPost() function is called WHEN form is validated
				formPost();

				return $text[23];
				} else {
						// default text of 'Submit Button'
						return $text[21];
			}
		}
		

# 
#  Posting From Inputs into Database
#

	function formPost() {

        require 'connection.php';

		// array initializations.
		$inputs = ["countryName", "cityName", "price", "rating", "note"]; 
		$review; $countryName; $cityName; $price; $rating; $note;

		// loop counter initialization - for proper placemenet of array items to be posted to database
		$i = 0;

		foreach ($inputs as $val) {
				
			$answer = filter_input(INPUT_POST, $val, FILTER_SANITIZE_SPECIAL_CHARS);
			
			// array containing user inputs. SQL Queries derived below in 'foreach' loop
			$review[$i] = $answer;

			// loop increment
			$i++;
		}

		$countryName = $review[0];
		$cityName = $review[1];
		$price = $review[2];
		$rating = $review[3];
		$note = $review[4];

		$sql = "SELECT CASE WHEN EXISTS (SELECT * FROM country INNER JOIN city ON abbreviation = '" . $countryName . "' WHERE cityName = '" . $cityName . "') THEN CAST(1 AS BIT) ELSE CAST(0 AS BIT) END";
			$rs = odbc_exec($connection,$sql);
			odbc_fetch_row($rs);
			$temp = odbc_result($rs,odbc_field_name($rs,1));

		if ($temp == 0){
			$sql = "INSERT INTO city (cityName, countryAbbreviation) VALUES ('" . $cityName . "', '" . $countryName . "')";
			$rs = odbc_exec($connection,$sql);
		} 

		$sql = "SELECT cityID FROM city WHERE cityName = '" . $cityName . "' AND countryAbbreviation =  '" . $countryName . "'"; 
			$rs = odbc_exec($connection,$sql);			
			odbc_fetch_row($rs);
			$cityID = odbc_result($rs,"cityID");


		$sql = "INSERT INTO reviews (countryAbbreviation, cityID, price, rating, note) VALUES ('" . $countryName . "', '" . $cityID . "', " . $price . ", " . $rating . ", '" . $note . "')"; 
			$rs = odbc_exec($connection,$sql);

	}


# 
#  Retrieving Countries in Database and returning to HTML 
#

	function countryOptionsPrinting() {

		require 'connection.php';
	
		$sql = "SELECT * FROM country";
		$rs = odbc_exec($connection,$sql);
		odbc_fetch_row($rs);
		$rows = odbc_num_rows($rs);

		echo '<option value=' . odbc_result($rs,"abbreviation") .'>' . odbc_result($rs,"name") . '</option>';

		while($myRow = odbc_fetch_array( $rs )){
			echo '<option value=' . odbc_result($rs,"abbreviation") .'>' . odbc_result($rs,"name") . '</option>';
		}
	}


# 
#  Retrieve and Post Three Anonymous Notes for Testimonials Requirement
#

	function printAnonymousNotes($text) {

		require 'connection.php';

		// variable initialization 
		$content; $filter = ""; 
		$sort = ($_POST['sort'] == 'Old') ? "ORDER BY post_date ASC" : "ORDER BY post_date DESC";

		if (isset($_POST['filter'])){
			$filter = $_POST['filter'];
			switch ($filter) {
				case 'default':
					break;
				
				default:
					$cityID = intval(substr($filter, 2));
					$countryAbbreviation = substr($filter, 0, 2);
					$temp = "WHERE reviews.cityID = " . $cityID ." AND reviews.countryAbbreviation = '" . $countryAbbreviation . "'"; 
					break;
			}
		}

		$sql = "SELECT TOP 3 reviews.ID, reviews.price, reviews.rating, reviews.countryAbbreviation, reviews.note, (country.name)countryName, reviews.cityID, city.cityName FROM reviews INNER JOIN country ON reviews.countryAbbreviation=country.abbreviation INNER JOIN city ON reviews.cityID = city.cityID " . $temp . " " . $sort;
			$rs = odbc_exec($connection,$sql);


		while(odbc_fetch_row($rs)) {
			$price = odbc_result($rs,"price");
			$rating = odbc_result($rs,"rating");
			$note = odbc_result($rs,"note");
			$city = odbc_result($rs,"cityName");
			$country = odbc_result($rs,"countryName");

		// printing star rating 
		switch ($rating) {
			case 3:
				$rating = "&#9733;&#9733;&#9733;"; break;
			case 2:
				$rating = "&#9733;&#9733;&#9734;"; break;
			default:
				$rating = "&#9733;&#9734;&#9734;"; break;
		}

		$price = getCurrencySymbol($price, $country);

		// content validation for the purpose of maintaing only the inclusiosn of functioning 
		// DB pulls (when ASCII characters are not involved). A Database Alteration of UTF8 
		// character sets may be required. -AQ
		if ($note != "") {
			$content .= '<div style="margin-top:3em;> <h4 style="text-align:center"><i>' . $note . '</i></h4></div> 
						<div style="margin-bottom:3em;"><p style="text-align:center; line-height:.5em;">' 
						. $rating . '  ' 
						. $price . ' ' 
						. $city . ', ' . $country . '</p></div>';
		} 	
	}
		return $content;
}


# 
#  Get Currency Symbol from CSV of Select Countries (Can be expanded upon..)
#
	
	function getCurrencySymbol($price, $country) {

		// csv parsed into an array from programs.csv
		$csv = array_map('str_getcsv', file('csv/currency.csv'));
	
		// currency symbol initialization
		$symbol;
		
		foreach ($csv as $val) {

			if ($country === $val[0]) {
				$symbol = $val[1]; 
				break;
			} else {
				$symbol = '&curren';
			}
 		}

 		switch ($price) {
 			case 3:	
 				return '&nbsp&nbsp&nbsp' . $symbol . ' ' . $symbol . ' ' . $symbol . '&nbsp&nbsp&nbsp'; 
 				break;
 			case 2: 
 				return '&nbsp&nbsp&nbsp' . $symbol . ' ' . $symbol . ' <span style="color:gray"> ' . $symbol . '</span>&nbsp&nbsp&nbsp';
 				break; 
 			default:
 				return '&nbsp&nbsp&nbsp' . $symbol . ' <span style="color:gray"> ' . $symbol . ' ' . $symbol . '</span>&nbsp&nbsp&nbsp';
 				break;
 		}
	}


# 
#  Drawing img paths from Database 
#

	function imgPrinting() {
	
		require 'connection.php';

		// find row count for a loop
		$sql = "SELECT * FROM img";
			$rs = odbc_exec($connection,$sql);
			odbc_fetch_row($rs);
			$rows = odbc_num_rows($rs);

		for ($i=1; $i <= $rows; $i++) { 
			
			$sql = "SELECT imgPath FROM img WHERE ID=$i";
				$rs = odbc_exec($connection,$sql);
				odbc_fetch_row($rs);
				$imgPath = odbc_result($rs,"imgPath");
			
			switch ($i) {
				case 1:
					$slideImgs .= 	'<li id="' . $i . '" class="hideable"  style="display:block;"> 
                        				<img src="images/' . $imgPath . '.jpg" alt="i1" height="100%" max-width= "580px" width="100%"> 
                    				</li>';
					break;
				
				default:
					$slideImgs .= 	'<li id="' . $i . '" class="hideable"> 
                        				<img src="images/' . $imgPath . '.jpg" alt="i2" height="100%" max-width= "580px" width="100%"> 
                    				</li>';
					break;
			}
		}
		return $slideImgs;
	}

# 
#  Get Wiki Categories from Database 
#

	function printFooterCategories() {
	
		require 'connection.php';

		// find row count for a loop
		$sql = "SELECT * FROM category";
			$rs = odbc_exec($connection,$sql);
			odbc_fetch_row($rs);
			$rows = odbc_num_rows($rs);

			echo '<li><a href="#' . odbc_result($rs,"name") . '" class="navStudy"><p>' . odbc_result($rs,"name") . '</p></a></li>';

		while($myRow = odbc_fetch_array( $rs )){
				echo '<li><a href="#' . odbc_result($rs,"name") . '" class="navStudy"><p>' . odbc_result($rs,"name") . '</p></a></li>';
			}
	}

	function printNavCategories() {

        require 'connection.php';

		// find row count for a loop
		$sql = "SELECT * FROM category";
			$rs = odbc_exec($connection,$sql);
			// odbc_fetch_row($rs);
			$rows = odbc_num_rows($rs);

			// echo '<a href="#' . odbc_result($rs,"name") . '"><div class="navBtn onMobile navStudy"><h3>' . odbc_result($rs,"name") . '</h3></div></a>';

		while($myRow = odbc_fetch_array( $rs )){
			echo '<a href="#' . odbc_result($rs,"name") . '"><div class="navBtn onMobile navStudy"><h3>' . odbc_result($rs,"name") . '</h3></div></a>';
		}
	}

	function printStudyCategories() {

        require 'connection.php';

		// find row count for a loop
		$sql = "SELECT * FROM category";
			$rs = odbc_exec($connection,$sql);
			odbc_fetch_row($rs);
			$rows = odbc_num_rows($rs);

			echo '<a href="#' . odbc_result($rs,"name") . '"><li>' . odbc_result($rs,"name") . '</li></a>';

		while($myRow = odbc_fetch_array( $rs )){
			echo '<a href="#' . odbc_result($rs,"name") . '"><li>' . odbc_result($rs,"name") . '</li></a>';
		}
	}


# 
#  Drawing img paths from Database 
#

	function printStudyContent() {
		
		require 'connection.php';

		// select all content from wikiEntry
		$sql="SELECT * FROM wikiEntry";
		$rs = odbc_exec($connection, $sql);
		odbc_fetch_row($rs);
		$rows = odbc_num_rows($rs); //returns num of rows to loop

		$prevCategoryName = ""; //initalize previous category check

		for ($i=1; $i <= $rows; $i++) { 
			
			$sql="SELECT (name)categoryName, title, content FROM category LEFT JOIN wikiEntry ON category.ID=wikiEntry.categoryID WHERE wikiEntry.ID = $i";
				$rs = odbc_exec($connection,$sql);
				odbc_fetch_row($rs);

			$categoryName = odbc_result($rs,"categoryName");

			echo '<div>';

			if ($categoryName != $prevCategoryName) {
				echo '<a name="' . $categoryName . '"></a><h2>' . $categoryName . '</h2>';
				$prevCategoryName = $categoryName;  
			}

			echo '<h4>' . odbc_result($rs,"title") . '</h4>' . odbc_result($rs,"content") . '</div>';
		}
	}

# 
#  Drawing img paths from Database 
#
	function printVisitedCountries() {

		require 'connection.php';

		$content = "";
	
		$sql = "SELECT * FROM city LEFT JOIN country ON countryAbbreviation = abbreviation;";
		$rs = odbc_exec($connection,$sql);

		// $rows = odbc_num_rows($rs);

		while(odbc_fetch_row($rs)){
			$cityID = odbc_result($rs,"cityID");
			$countryAbbreviation = odbc_result($rs,"abbreviation");
			$cityName = odbc_result($rs,"cityName");
			$countryName = odbc_result($rs,"name");

			$value = $countryAbbreviation . $cityID;
			$display = ucfirst($cityName) . ", " . ucfirst($countryName);
			$content .= '<option value=' . $value .'>' . $display . '</option>';
		}

		return $content;
	}
?> 
