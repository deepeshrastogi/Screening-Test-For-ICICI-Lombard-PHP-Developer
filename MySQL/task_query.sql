
-- 1) Names of cities which have not been visited by any traveler at all.

select cities.city_name FROM cities
left join city_travel_history on cities.id = city_travel_history.city_id
left join travelers on travelers.id = city_travel_history.traveller_id where traveller_id is null group by cities.city_name;


-- 2) Against every traveler, number of distinct cities travelled during the month of Oct 2022

select DISTINCT count((cities.city_name)) as num_cities_travelled,travelers.traveller_name FROM travelers
left join city_travel_history on travelers.id = city_travel_history.traveller_id
left join cities on city_travel_history.city_id = cities.id where "Oct 2022" BETWEEN DATE_FORMAT(from_date, '%b %Y') AND DATE_FORMAT(to_date, '%b %Y') group by travelers.traveller_name;


-- 3) Query to find top five cities by number of distinct travellers based on overall travel history ordered by number of distinct travellers in descending order

select DISTINCT count((cities.city_name)) as num_cities_travelled,cities.city_name FROM travelers
left join city_travel_history on travelers.id = city_travel_history.traveller_id
left join cities on city_travel_history.city_id = cities.id 
group by cities.city_name order by num_cities_travelled desc limit 5;


-- 4) Names of cities which have not been visited by any traveller during the month of Oct 2022

select cities.city_name FROM cities
left join city_travel_history on cities.id = city_travel_history.city_id
left join travelers on travelers.id = city_travel_history.traveller_id 
where city_travel_history.traveller_id is null OR "Oct 2022" NOT BETWEEN DATE_FORMAT(city_travel_history.from_date, '%b %Y') AND DATE_FORMAT(city_travel_history.to_date, '%b %Y') group by cities.city_name;