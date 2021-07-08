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
	$countryOptions = countryOptionsPrinting();
	$slideImgs = imgPrinting();
	$text = primaryLanguage($currentLanguage);
	$anonymousNotes = printAnonymousNotes($text);
	$submitText = formValidation($text);


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
		$inputs = ["cityName", "countryName", "price", "rating", "note"]; 
		$review;

		// loop counter initialization - for proper placemenet of array items to be posted to database
		$i = 0;

		foreach ($inputs as $val) {
				
					$answer = filter_input(INPUT_POST, $val, FILTER_SANITIZE_SPECIAL_CHARS);
					
					// array containing user inputs. SQL Queries derived below in 'foreach' loop
					$review[$i] = $answer;

					// loop increment
					$i++;
				}

		// SQL INSERTS for once values are allocated to $results[array]
		$sql = "INSERT INTO location (city, country) VALUES ('$review[0]', '$review[1]')";
			$rs = odbc_exec($connection,$sql);

		$sql = "SELECT TOP 1 ID FROM location ORDER BY ID DESC";
			$rs = odbc_exec($connection,$sql);
			odbc_fetch_row($rs);
			$locationID = odbc_result($rs,"ID");

		$sql = "INSERT INTO reviews (locationID, price, rating, note) VALUES ('$locationID', '$review[2]', '$review[3]', '$review[4]')";
			$rs = odbc_exec($connection,$sql);

			}


# 
#  Parsing a CSV into an Array containing Countries of the World 
#

	function countryOptionsPrinting() {
	
		// csv parsed into an array from programs.csv
		$csv = array_map('str_getcsv', file('csv/programs.csv'));

		foreach ($csv as $val) {
			$countryOptions .= '<option value=' . $val[0] .'>' . $val[0] . '</option>';
		}
		return $countryOptions;
	}


# 
#  Retrieve and Post Three Anonymous Notes for Testimonials Requirement
#

	function printAnonymousNotes($text) {

		require 'connection.php';

		// variable initialization 
		$content = '<h2> ' . $text[13] . ' </h2>';
		$j; //a soon to be randomized integer 

		// array to avoid repeat random integers below
		$random = [0, 0, 0];

		// find row count for min & max of random function
		$sql = "SELECT * FROM reviews";
			$rs = odbc_exec($connection,$sql);
			odbc_fetch_row($rs);
			$rows = odbc_num_rows($rs);

		for ($i; $i <= 2; $i++) {

			/*  each number in $random is compared to $j to find similarity. 
				if the same, the $j will be re-randomized. NOTE: $j and random[0] 
				are initially equal. */
			foreach($random as $val) {
				if ($j != $val) {
					$random[$i] = $j; // eliciting values upon their relays 
				} else {
					$j = rand(1,($rows)); // random number generation
					$random[$i] = $j; 
				}
			}

			$sql = "SELECT * FROM reviews JOIN location ON reviews.locationID = location.ID WHERE reviews.ID=$j";
				$rs = odbc_exec($connection,$sql);
				odbc_fetch_row($rs);
				$locationID = odbc_result($rs,"locationID");
				$price = odbc_result($rs,"price");
				$rating = odbc_result($rs,"rating");
				$note = odbc_result($rs,"note");
				$city = odbc_result($rs,"city");
				$country = odbc_result($rs,"country");

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

		$content .= '<h4> ' . $text[14] . ' </h4>'; 

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
?> 