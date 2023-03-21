1 SELECT Movies.title FROM Movies

2 SELECT Movies.rating FROM Movies GROUP BY Movies.rating

3 SELECT * FROM Movies WHERE Movies.rating IS NULL

4 SELECT * FROM MovieTheaters WHERE MovieTheaters.Movie IS NULL

5 SELECT * FROM `MovieTheaters` JOIN Movies on Movies.code = MovieTheaters.Movie

6 SELECT Movies.code, Movies.title, Movies.rating FROM `MovieTheaters` JOIN Movies on Movies.code = MovieTheaters.Movie

7 SELECT Movies.title FROM Movies WHERE Movies.code NOT IN 
(
    SELECT Movies.code FROM Movies JOIN MovieTheaters on MovieTheaters.Movie = Movies.code
)

8 UPDATE Movies SET Movies.rating = "G" WHERE Movies.rating IS NULL

9 DELETE FROM MovieTheaters WHERE MovieTheaters.Movie IN 
(
    SELECT Movies.code FROM Movies WHERE Movies.rating = "NC-17"
)