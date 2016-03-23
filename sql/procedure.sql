--NOT USED

CREATE PROCEDURE createReview (@countryAbbreviation CHAR(2), @cityName VARCHAR(25), @price int, @rating int, @note VARCHAR(140))
AS 
BEGIN 
	DECLARE 
	@temp bit, @cityID int
	SELECT @temp = (SELECT CASE WHEN EXISTS (SELECT * FROM country INNER JOIN city ON abbreviation = @countryAbbreviation WHERE city.name = @cityName) THEN CAST(1 AS BIT) ELSE CAST(0 AS BIT) END)

	IF @temp = 0
      BEGIN
      	INSERT INTO city (name, countryAbbreviation) VALUES (@cityName, @countryAbbreviation);
      END

      SELECT @cityID = (SELECT ID FROM city WHERE UPPER(name) = UPPER(@cityName));

   INSERT INTO reviews (countryAbbreviation, cityID, price, rating, note) VALUES (@countryAbbreviation, @cityID, @price, @rating, @note)
END 
