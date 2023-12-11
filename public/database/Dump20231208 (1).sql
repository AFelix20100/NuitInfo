CREATE DATABASE  IF NOT EXISTS `nuitInfo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `nuitInfo`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 172.16.119.6    Database: nuitInfo
-- ------------------------------------------------------
-- Server version	5.5.5-10.5.21-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20231207194340','2023-12-07 19:46:25',119),('DoctrineMigrations\\Version20231207195618','2023-12-07 19:56:29',43),('DoctrineMigrations\\Version20231207202609','2023-12-07 20:26:17',92),('DoctrineMigrations\\Version20231207215159','2023-12-07 21:52:38',5);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` longtext DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `slug` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,'Vrai ou faux : Les Gazs à effet de serres sont dangereux pour l\'hommes','Ce phénomène naturel, appelé effet de serre, rend la vie possible sur Terre : sans lui, la température moyenne de la planète serait en effet de l’ordre de - 18°C. Ces gaz à effet de serre, notamment leur concentration dans l’atmosphère, jouent donc un rôle important dans la régulation du climat. Le DANGER vient du fait de la non régulation naturelle de ceux-ci.','https://tinyurl.com/environnementgouv','environnement gouv'),(2,'Vrai ou faux : Il n\'y a que les hommes qui polluent ?','Faux C\'est bien connu, les vaches sont un désastre pour la planète : en France, l\'élevage bovin émet 35 millions de tonnes d\'équivalent CO2. À l\'échelle mondiale, c\'est l\'élevage qui pollue le plus, loin devant l\'élevage de porcs et de volailles.\nPourtant l’élevage de Vache est très important dans l’alimentation mondiale.','https://www.ina.fr/ina-eclaire-actu/vache-bovin-methane-pollution-alerte-cour-des-comptes','ina'),(3,'La France est une goutte d’eau : ce sont la Chine et l’Inde qui émettent les plus grandes quantités de gaz à effet de serre.','FAUX – C’est un argument qui ne tient pas la route, même si la France et ses 67 millions d’habitants représentent à peine plus de 1 % des émissions mondiales de gaz à effet de serre. Certes, nous n’avons pas d’emprise directe, droit de souveraineté oblige, sur la politique énergétique chinoise, mais nous avons une part de responsabilité certaine dans l’origine de nos produits de consommation. Manger Local peut donc aider à sauver la planète ','https://www.lemonde.fr/planete/article/2022/03/14/climat-la-france-est-elle-vraiment-un-petit-pollueur-a-l-echelle-mondiale_6117458_3244.html','le monde'),(4,' Avoir un mode de vie écologique ne sert à rien, c\'est l’activité économique qui pollue !','FAUX – Qu’est-ce qu’un mode de vie écologique ? C’est vivre sans souffrir de la chaleur (ou du froid), respirer un air sain, boire une eau propre et non contaminée, manger des fruits, légumes et céréales qui ont du goût et ne sont pas chargés de pesticides – ou d’additifs et autres sucres, sel ou gras ajoutés par l’industrie agro-alimentaire. C’est aussi consommer modérément des protéines d’origine animale, y compris les bas morceaux, en cuisinant les restes sous forme de raviolis, hachis, tourtes. Enfin, c’est s’approvisionner auprès de producteurs locaux, bien rémunérés, donc à même d’entretenir les haies, bocages, frondaisons, qui pourront stocker le carbone et régénérer le vivant, tout en dessinant des paysages plaisants et des zones de loisir.','https://www.ecologie.gouv.fr/sites/default/files/Th%C3%A9ma%20-%20Modes%20de%20vie%20et%20pratiques%20environnementales%20des%20Fran%C3%A7ais.pdf','ecologie gouv'),(5,'Il est impossible de nourir la planette avec une agriculture bio ?','FAUX, Sans entrer dans un débat sur les techniques agricoles, ce sont nos habitudes de consommation et le gaspillage alimentaire qui sont au centre de cette question. Aujourd’hui, plus de 40 % des denrées sont jetées, et notre surproduction de viande contraint à cultiver des tonnes de céréales destinées à l’élevage. Deux autres phénomènes limitent les surfaces disponibles pour l’agriculture : l’étalement urbain et les agro-carburants (manger ou conduire, il va falloir choisir !).','https://tinyurl.com/expressagriculture','l\'express');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` longtext DEFAULT NULL,
  `answer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Les sacs en plastique biodégradables se décomposent plus rapidement que le plastique traditionnel ?',1),(2,'Planter davantage d\'arbres inverse complètement le changement climatique ?',1),(3,'Les voitures hybrides consomment-elles moins d’énergie ?',1),(4,'L\'utilisation du papier recyclé est plus écologique que le papier traditionnel ?',1),(5,'La surpopulation mondiale est-elle la principale cause du changement climatique ?',1),(6,'L\'utilisation de pesticides est-elle toujours nuisible à l\'environnement ?',1),(7,'La production de viande cultivée en laboratoire est-elle exempte d\'impact environnemental ?',1),(8,'Le recyclage du plastique garantit-il qu\'il ne finit jamais dans les océans ?',1),(9,'Les éoliennes sont-elles responsables de la mort massive d\'oiseaux ?',1),(10,'Les douches consomment-elles moins d\'eau que les bains ?',1),(11,'La fonte des glaciers est-elle uniquement causée par le réchauffement climatique d\'origine humaine ?',1),(12,'La régénération naturelle des forêts suffit-elle pour compenser le réchauffement climatique humaine ?',1),(13,'Les technologies de capture du carbone peuvent-elles résoudre complètement le problème des émissions de CO2 ?',1),(14,'Les écosystèmes marins se rétablissent-ils rapidement après une marée noire ?',1),(15,'Les centrales nucléaires n\'émettent-elles aucune émission de gaz à effet de serre ?',1),(16,'Les technologies de géo-ingénierie peuvent-elles résoudre les problèmes liés au changement climatique ?',1),(17,'Les initiatives de reboisement peuvent-elles compenser complètement la perte de forêts primaires ?',1),(18,'Les panneaux solaires ne génèrent-ils de l\'électricité que par temps ensoleillé ?',1),(19,'La pollution plastique dans les océans provient-elle principalement de grandes entreprises industrielles ?',1),(20,'L\'utilisation de l\'énergie nucléaire est-elle sans danger pour l\'environnement ?',1),(21,'Les véhicules électriques sont-ils plus polluants que les voitures à essence en raison de la production des batteries ?',0),(22,'Les énergies renouvelables sont-elles incapables de fournir une source d\'énergie constante ?',0),(23,'Le tri sélectif des déchets ne sert à rien car tout finit par être mélangé lors de la collecte.',0),(24,'L\'agriculture biologique nécessite plus de terres que l\'agriculture conventionnelle, contribuant à la déforestation.',0),(25,'Les parcs éoliens perturbent-ils massivement la migration des oiseaux ?',0),(26,'La surpopulation mondiale est-elle un mythe, et il y a suffisamment de ressources pour tous ?',0),(27,'La déforestation n\'a-t-elle aucun impact sur le climat mondial ?',0),(28,'Les technologies de capture du carbone peuvent-elles éliminer complètement les émissions de CO2 ?',0),(29,'Les technologies de désalinisation de l\'eau de mer ne produisent-elles aucun sous-produit polluant ?',0),(30,'Les technologies de modification du climat, telles que la géo-ingénierie, sont-elles sans risque pour l\'environnement ?',0),(31,'Les technologies de capture du carbone peuvent-elles être une excuse pour ne pas réduire les émissions à la source ?',0),(32,'Les centrales nucléaires n\'émettent-elles aucune pollution dans l\'atmosphère ?',0),(33,'Les actions individuelles ne contribuent-elles pas à la lutte contre le changement climatique ?',0),(34,'Le réchauffement climatique n\'est pas urgent et peut être traité plus tard',0),(35,'La Terre a déjà connu des périodes plus chaudes par le passé',0),(36,'Le réchauffement climatique n\'affecte que la surface de la Terre.',0),(37,'Les mesures d\'adaptation sont-elles suffisantes pour faire face au changement climatique',0),(38,'La glace fondue des glaciers n\'affecte que les amateurs de sports d\'hiver',0),(39,'Les pays en développement ne contribuent pas significativement au réchauffement climatique.',0),(40,'Les océans absorbent tout le dioxyde de carbone émis, atténuant ainsi le réchauffement.',0),(41,'Les hivers rigoureux contredisent le réchauffement climatique',0),(42,'Certaines régions bénéficieront du réchauffement climatique avec des hivers plus doux.',1),(43,'La hausse du niveau de CO2 favorise la croissance des plantes.',1),(44,'Les émissions de méthane provenant des animaux d\'élevage sont-elles négligeables.',0);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `certificat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'toto','[]','$2y$13$9URtu8dfEqIei0VOJRZZOuVNBfvvHDJmt6NoUi.0bIqOCtXe/.gte',0),(2,'tata','[]','$2y$13$.WYqcHj5GBbGULrkfcMK/uBfe.NmvCkOkNldILaXQjxv//XyiGFXK',0),(3,'4rn4ud','[]','$2y$13$dMKjmIOzAtZjeRUlLw4AY.uWJSGd54Pv0lhI9eye.Qszq/0vLELGC',0),(4,'test','[]','$2y$13$3ZTAQqswZ8zT5q0Ftf38kuyviz.f/yIR8Y8GglOV3UBlceSqHNUm2',0),(5,'nicu','[]','$2y$13$2Asz67oOV0xOhVW.Yi20W.tTLZGOLLrd1tV3iXwgZ2DM7t0PBYUxu',0),(6,'Test1','[]','$2y$13$OH/rBHJYkWjY6Nl5WO1C/upuvIaMowmv2r01MWa0jO5cdKkxQX/Ke',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_quiz`
--

DROP TABLE IF EXISTS `user_quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `result` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DE93B65BA76ED395` (`user_id`),
  CONSTRAINT `FK_DE93B65BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_quiz`
--

LOCK TABLES `user_quiz` WRITE;
/*!40000 ALTER TABLE `user_quiz` DISABLE KEYS */;
INSERT INTO `user_quiz` VALUES (12,5,10,'2023-12-08 05:11:50');
/*!40000 ALTER TABLE `user_quiz` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-08  6:17:34
