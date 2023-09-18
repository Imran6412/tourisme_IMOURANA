<?php
function afficherImageParID($idImage) {
   
    $conn = new mysqli('localhost', 'root', '', 'tourisme');

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }
$sql = "SELECT id, images, nom FROM admin WHERE id = $idImage";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idImage = $row['id'];
        $contenuImage = $row['images'];
        $nomImage = $row['nom'];
  $html = '<img src="data:image/jpeg;base64,' . base64_encode($contenuImage) . '" alt="Image ' . $idImage . '" >';

     
        $conn->close();

        return $html;
    } else {
       
        $conn->close();
        
        return "Aucune image n'a été trouvée dans la base de données pour l'ID spécifié.";
    }
}

function afficherTexteParNom($nomtexte) {
   
    $conn = new mysqli('localhost', 'root', '', 'tourisme');

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $nomTexteEchappe = $conn->real_escape_string($nomtexte);


    $sql = "SELECT contenu FROM texte WHERE nomtexte = '$nomTexteEchappe'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $contenuTexte = $row['contenu'];

      
        echo '<div class="texte">' . $contenuTexte . '</div>';
    } else {
        echo "Aucun texte trouvé dans la base de données pour le nom spécifié.";
    }

   
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class='container'>
<?php include 'header.php' ?>    

<section>
<div class="par3"> <?php echo afficherImageParID(5); ?> </div>

<h2> <?php echo afficherTexteParNom("titre"); ?> </h2>


<?php echo afficherTexteParNom("par1"); ?>

<h2><?php echo afficherTexteParNom("evolution"); ?> </h2>

<?php echo afficherTexteParNom("graph1"); ?>


<div class='par4'><?php echo afficherImageParID(7); ?> </div>

<h2><?php echo afficherTexteParNom("evolution1"); ?> </h2>

<?php echo afficherTexteParNom("graph2"); ?>

<div class='par4'><?php echo afficherImageParID(8); ?> </div>

</section>

<?php include 'footer.php' ?>

</div>
</body>
</html>


