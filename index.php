<?php
require_once './vendor/fzaninotto/faker/src/autoload.php';
$faker = Faker\Factory::create();
require_once './vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<?php
	$loader = new Twig_Loader_Array(array(
		'companyName' => $faker->company,
		'logo' => $faker->imageUrl,
		'catchPhrase' => $faker->catchPhrase,
		'productAdjective' => $faker->word,
		'productName' => $faker->word,
		'productMaterial' => $faker->sentence,
		'price' => $faker->numberBetween($min = 10, $max = 99),
		'url' => $faker->url,
		'color' => $faker->safeColorName,
		'userName' => $faker->name,
		'photo' => $faker->imageUrl($width=200, $height=200, 'abstract'),
		'job' => $faker->jobTitle,
		'email' => $faker->freeEmail,
		'phone' => $faker->e164PhoneNumber,
		'adressNbr' => $faker->buildingNumber,  
		'adressStreet' => $faker->streetName,    
		'adressPost' => $faker->postcode,    
		'adressCity' => $faker->city
		)
	);
	$tw = new Twig_Environment($loader);
	echo "<div id='left'>
			<div id='header'>
				<h1 id='companyname'>".$tw->render("companyName")."</h1>
				<span id='catchphrase'>".$tw->render("catchPhrase")."</span>
			</div>
				<span id='adjective'>At ".$tw->render("companyName").", we create".$tw->render("productAdjective")." ".$tw->render("productName")." made of ".$tw->render("productMaterial")." </span>
				<span>find out more on </span>
				<a href='".$tw->render("url")."' id='findmore'>".$tw->render("catchPhrase").".com</a>
				<div id='card'>
					<img src='".$tw->render("logo")."' alt=''>
					<h3>".$tw->render("productName")."</h3>
					<span>".$tw->render("productMaterial").$tw->render("color")."</span>
					<span>".$tw->render("price")."</span>
					<button>Take my money bitch !</button>
				</div>
			</div>
			<div id='user'>
				<img src='".$tw->render("photo")."' alt=''>
				<span id='username'>".$tw->render("userName")."</span>
				<span id='userjob'>".$tw->render("job")."</span>
				<div id='contact'>
					<h4>Contact info</h4>
					<span id='infocontact'>".$tw->render("email").$tw->render("phone").$tw->render("adressNbr").$tw->render("adressStreet")."</span>
				</div>
			</div>";
		?>

	</body>
	</html>