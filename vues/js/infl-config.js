var json_ig_category = '{ "categories": [ { "category": "Television & Film", "categoryId": 1 }, { "category": "Music", "categoryId": 3 }, { "category": "Cars", "categoryId": 5 }, { "category": "Shopping & Retail", "categoryId": 7 }, { "category": "Coffee, Tea & Beverages", "categoryId": 9 }, { "category": "Camera & Photography", "categoryId": 11 }, { "category": "Clothes, Shoes, Handbags & Accessories", "categoryId": 13 }, { "category": "Beer, Wine & Spirits", "categoryId": 19 }, { "category": "Sports", "categoryId": 21 }, { "category": "Electronics & Computers", "categoryId": 25 }, { "category": "Gaming", "categoryId": 30 }, { "category": "Activewear", "categoryId": 33 }, { "category": "Art & Design", "categoryId": 36 }, { "category": "Travel, Tourism & Aviation", "categoryId": 43 }, { "category": "Business & Careers", "categoryId": 58 }, { "category": "Home Décor, Furniture & Garden", "categoryId": 71 }, { "category": "Luxury Apparel", "categoryId": 74 }, { "category": "Beauty & Cosmetics", "categoryId": 80 }, { "category": "Healthcare & Medicine", "categoryId": 100 }, { "category": "Fashion & Style", "categoryId": 120 }, { "category": "Jewellery & Watches", "categoryId": 130 }, { "category": "Restaurants, Food & Grocery", "categoryId": 139 }, { "category": "Toys, Children & Baby", "categoryId": 190 }, { "category": "Fitness & Yoga", "categoryId": 196 }, { "category": "Wedding", "categoryId": 291 }, { "category": "Tobacco & Smoking", "categoryId": 405 }, { "category": "Friends, Family and Relationships", "categoryId": 506 }, { "category": "Motorbikes", "categoryId": 539 }, { "category": "Pets", "categoryId": 673 }, { "category": "Healthy Lifestyle", "categoryId": 798 } ] }';
var ig_category = JSON.parse(json_ig_category);

var json_ig_country = '{ "countrys": [ { "country": "Canada", "countryId": 1428125 }, { "country": "USA", "countryId": 148838 }, { "country": "United Kingdom", "countryId": 62149 }, { "country": "France", "countryId": 2202162 } ] }';

var ig_country = JSON.parse(json_ig_country);

var reponse_ig = '';

jQuery(document).ready(function ($) {

// select category instagram
	for(i=0; i<ig_category.categories.length; i++) {
		$('#infl-category-ig').append('<option value="'+ig_category.categories[i].categoryId+'">'+ig_category.categories[i].category+'</option>');
	}

// select country instagram
	for(i=0; i<ig_country.countrys.length; i++) {
		$('#infl-country-ig').append('<option value="'+ig_country.countrys[i].countryId+'">'+ig_country.countrys[i].country+'</option>');
	}



});
	