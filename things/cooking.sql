-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 08:50 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userName` varchar(20) NOT NULL,
  `recNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `userName` varchar(9) NOT NULL,
  `recID` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `commentText` text NOT NULL,
  `commPhoto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `userName`, `recID`, `rank`, `commentText`, `commPhoto`) VALUES
(1, 'inbar292', 1, 5, 'vary good!', 'things/rissoto.jpg'),
(2, 'Admin', 1, 4, 'this mushroom risotto turned out great!\r\nwill recommend.', NULL),
(3, 'Admin', 1, 2, 'megh', 'images/'),
(4, 'inbar321', 1, 5, 'loved it!!!', 'images/'),
(5, 'inbar321', 1, 4, 'it was really good', 'images/'),
(6, 'inbar292', 2, 5, 'loved it!', NULL),
(7, 'Admin', 3, 4, 'really good!!', NULL),
(8, 'amirB', 4, 3, 'megh', NULL),
(9, 'Admin', 1, 2, 'not very good', 'images/');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `userName` varchar(9) NOT NULL,
  `recID` int(11) NOT NULL,
  `orderNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`userName`, `recID`, `orderNum`) VALUES
('Admin', 1, 1),
('Admin', 2, 1),
('amirB', 1, 2),
('amirB', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recID` int(11) NOT NULL,
  `recName` varchar(20) NOT NULL,
  `howToMake` text NOT NULL,
  `recPrice` int(11) NOT NULL,
  `recPhoto` varchar(100) NOT NULL,
  `recGros` text NOT NULL,
  `recLink` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recID`, `recName`, `howToMake`, `recPrice`, `recPhoto`, `recGros`, `recLink`) VALUES
(1, 'Mushroom Risotto', '<ol>\r\n<li>In a medium pot, put butter. Add onions, mushrooms, garlic and thyme and fry for 5 minutes.</li>\r\n<li>Add the round rice and vegetable stock (each time add one ladle and stir).</li>\r\n<li>Taste the risotto. We\'re checking that he\'s half ready. It is supposed to be a nagis fabric and not very soft.</li>\r\n<li>Add the cream and Parmesan cheese. Cook for another 10 minutes.</li>\r\n<li>Season with salt and pepper and serve.</li>\r\n</ol>', 55, 'things/rissoto.jpg', '<h4>For 4 servings:</h4>\r\n<ul>\r\n<li>500 grams of round rice. Preferably Arborio</li>\r\n<li>1 medium sliced onion thin</li>\r\n<li>300 g freshly sliced mushrooms</li>\r\n<li>2 garlic cloves, chopped</li>\r\n<li>A tablespoon of butter</li>\r\n<li>80 grams of grated Parmesan cheese</li>\r\n<li>250 ml sweet cream</li>\r\n<li>Leaves from 3 thyme branches</li>\r\n<li>750 ml vegetable stock or water</li>\r\n</ul>', 'mrissoto.php'),
(2, 'Homemade pizza', '<ol>\r\n<li>Make the base: Put the flour into a large bowl, then stir in the yeast and salt. Make a well, pour in 200ml warm water and the olive oil and bring together with a wooden spoon until you have a soft, fairly wet dough.\r\n<li>Turn onto a lightly floured surface and knead for 5 mins until smooth. <li>Cover with a tea towel and set aside. You can leave the dough to rise if you like, but it’s not essential for a thin crust.\r\n<li>Make the sauce: Mix the passata, basil and crushed garlic together, then season to taste. Leave to stand at room temperature while you get on with shaping the base.\r\n<li>Roll out the dough: If you’ve let the dough rise, give it a quick knead, then split into two balls. On a floured surface, roll out the dough into large rounds, about 25cm across, using a rolling pin. The dough needs to be very thin as it will rise in the oven.\r\n<li>Lift the rounds onto two floured baking sheets.\r\n</li><li>Top and bake: Heat oven to 240C/fan 220C /gas 8. Put another baking sheet or an upturned baking tray in the oven on the top shelf. Smooth sauce over bases with the back of a spoon. </li><li>Scatter with cheese and tomatoes, drizzle with olive oil and season. Put one pizza, still on its baking sheet, on top of the preheated sheet or tray. Bake for 8-10 mins until crisp. Serve with a little more olive oil, and basil leaves if using. Repeat step for remaining pizza.</ol>', 42, 'things/pizza.jpg', '<h4>For 8 servings:</h4>\r\n<ul>\r\n<li>300g strong bread flour</li>\r\n<li>1 tsp instant yeast</li>\r\n<li>1 tsp salt</li>\r\n<li>1 tbsp olive oil</li>\r\n<li>handful fresh basil or 1 tsp dried</li>\r\n<li>1 garlic clove, crushed</li>\r\n<li>100ml passata</li>\r\n<li>125g ball mozzarella, sliced</li>\r\n<li>handful grated or shaved parmesan</li></ul>', 'pizza.php'),
(3, 'Schnitzel', '<ol>\r\n<li>Lay down a 2-foot long strip of plastic wrap on your kitchen countertop.\r\n</li><li>Place chicken breasts on the plastic, leaving a 2-inch space between each breast.\r\n</li><li>Cover the breasts with another strip of plastic, so the meat is sandwiched between two layers of plastic. Use a mallet to pound the breasts until they are a little less than ¼ inch thick.\r\n</li><li>Set up three wide, shallow bowls and a large plate on your countertop. In your first bowl, put the flour. In your second bowl, beat the eggs. \r\n</li><li>In your third bowl, stir together the breadcrumbs, paprika, 1/4 tsp salt and sesame seeds (optional) till well blended.\r\n</li><li>Leave an empty plate nearby where you will place your coated schnitzels.\r\n</li><li>Pour oil into a skillet until it’s deep enough for frying (about ½ inch). Heat the oil slowly over medium. While oil is heating, dip each breast one by one into your breading bowls—first coat with flour, then with egg, then with breadcrumb mixture.\r\nThe ideal temperature to fry schnitzel is around 375 degrees F. When the oil is hot (but not smoking or splattering), fry the coated breasts in single-layer batches until they are golden brown on both sides. If your oil is at the right temperature, it should take about 3-4 minutes per side. Don’t fry more than two breasts at a time in a regular sized skillet, or the oil temperature will drop and the schnitzels will become greasy.\r\n</li><li>After frying, set the schnitzels on a paper towel and pat them dry to soak off excess oil.\r\nSprinkle the schnitzels with additional salt to taste. Serve hot garnished with lemon wedges and your favorite condiment.</li></ol>', 60, 'things/schnitzel.png', '<h4>For 4 servings:</h4>\r\n<ul>\r\n<li>4 4-ounce skinless, boneless </li><li>chicken breasts, pounded to 1/8-inch thickness\r\n</li><li>Kosher salt and freshly ground <li>black pepper\r\n</li><li>1 cup all-purpose flour (for dredging)\r\n</li><li>2 large eggs\r\n</li><li>1 tablespoon Dijon mustard\r\n</li><li>2 cups (or more) whole wheat (or regular) panko (Japanese breadcrumbs)\r\n</li><li>2 tablespoons canola oil, divided\r\n</li><li>2 tablespoons unsalted butter, divided</li></ul>', 'schnitzel.php'),
(4, 'Onion soup', '<ol>\r\n<li>Melt butter with olive oil in an 8 quart stock pot on medium heat. Add onions and continually stir until tender and translucent. Do not brown the onions.\r\n<li>Add beef broth, sherry and thyme. Season with salt and pepper, and simmer for 30 minutes.\r\nHeat the oven broiler.\r\n</li><li>Ladle soup into oven safe serving bowls and place one slice of bread on top of each (bread may be broken into pieces if you prefer). \r\n</li><li>Layer each slice of bread with a slice of provolone, 1/2 slice diced Swiss and 1 tablespoon Parmesan cheese. Place bowls on cookie sheet and broil in the preheated oven until cheese bubbles and browns slightly.</li></ol>', 35, 'things/onionsoup.jpg', '<h4>For 4 servings:</h4>\r\n<ul>\r\n<li>1/2 cup unsalted butter</li>\r\n<li>2 tablespoons olive oil</li>\r\n<li>4 cups sliced onions</li>\r\n<li>4 (10.5 ounce) cans beef broth</li>\r\n<li>1 teaspoon dried thyme</li>\r\n<li>salt and pepper to taste</li>\r\n<li>4 slices French bread</li>\r\n<li>4 slices provolone cheese</li>\r\n<li>1/4 cup grated Parmesan cheese</li></ul>', 'onionsoup.php');

-- --------------------------------------------------------

--
-- Table structure for table `rectag`
--

CREATE TABLE `rectag` (
  `recID` int(11) NOT NULL,
  `tagName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rectag`
--

INSERT INTO `rectag` (`recID`, `tagName`) VALUES
(1, 'dinner'),
(1, 'kosher'),
(1, 'vegetarian'),
(2, 'dinner'),
(2, 'kosher'),
(2, 'lunch'),
(3, 'dinner'),
(3, 'kosher'),
(3, 'lunch'),
(3, 'meat'),
(4, 'dinner'),
(4, 'kosher'),
(4, 'vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `subcomments`
--

CREATE TABLE `subcomments` (
  `commentID` int(11) NOT NULL,
  `SubCommentID` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `subtext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcomments`
--

INSERT INTO `subcomments` (`commentID`, `SubCommentID`, `userName`, `subtext`) VALUES
(1, 1, 'inbar292', 'you are right!'),
(1, 2, 'amirB', 'i dont agree so much'),
(4, 1, 'Admin', 'agree!!');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tagName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tagName`) VALUES
('desserts'),
('dinner'),
('kosher'),
('lunch'),
('meat'),
('snacks'),
('vegan'),
('vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userName` varchar(10) NOT NULL,
  `userFName` varchar(10) NOT NULL,
  `userSName` varchar(10) NOT NULL,
  `userMail` varchar(35) NOT NULL,
  `userPhone` varchar(10) NOT NULL,
  `userAddress` varchar(20) NOT NULL,
  `userCity` varchar(20) NOT NULL,
  `userPass` varchar(10) NOT NULL,
  `userDOB` date NOT NULL,
  `userPhoto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `userFName`, `userSName`, `userMail`, `userPhone`, `userAddress`, `userCity`, `userPass`, `userDOB`, `userPhoto`) VALUES
('Admin', 'amy', 'amy', 'admin@gmail.com', '0528123456', 'amy house 1', 'tel aviv', 'Admin', '1991-10-01', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAflBMVEX///8AAAB0dHSGhobo6OiWlp'),
('amirB', 'amir', 'binenfeld', 'amir.binen@gmail.com', '0548125520', 'de shalit 4', 'holon', 'amirpass', '1992-03-09', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxAQEBAQEBAVEBAVDRIbDRUVDRsQEA4SIB0iIiAdH'),
('dan321', 'daniel', 'nach', 'daniel321@live.com', '0548234854', 'hertzel 3', 'haifa', '321654', '1990-05-18', NULL),
('inbar292', 'inbar', 'shwartz', 'inbar292@gmail.com', '0528323881', 'bat hen 52', 'haifa', 'gbcr123', '1994-09-29', 'C:\\xampp\\htdocs\\WEBPROJECT\\images\\inbar.jpg'),
('inbar321', 'amber', 'amber', 'inbar_292@hotmail.com', '0528323881', 'bat hen 52', 'haifa', '123', '1995-09-29', 'images//4d82f87b-bbe0-40ee-8909-4b7567962914.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`userName`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recID`);

--
-- Indexes for table `rectag`
--
ALTER TABLE `rectag`
  ADD PRIMARY KEY (`recID`,`tagName`),
  ADD KEY `tagName` (`tagName`);

--
-- Indexes for table `subcomments`
--
ALTER TABLE `subcomments`
  ADD PRIMARY KEY (`commentID`,`SubCommentID`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tagName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rectag`
--
ALTER TABLE `rectag`
  ADD CONSTRAINT `rectag_ibfk_1` FOREIGN KEY (`tagName`) REFERENCES `tag` (`tagName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
