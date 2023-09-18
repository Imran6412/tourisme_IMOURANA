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
    <title>accueil</title>
    <link rel="stylesheet" href="accueil.css">
</head>
<body>
    
<?php include 'header.php' ?>

<h2><?php echo afficherTexteParNom("site"); ?></h2>
<section class='s2'>
    <div class='s21'>
        <div class='im2'> <?php echo afficherImageParID(9); ?> </div>
        <div class='s211'>
            <h3><?php echo afficherTexteParNom("mosquee"); ?></h3>
            <p><?php echo afficherTexteParNom("par_mosque"); ?></p>
            <button class='btn1'><?php echo afficherTexteParNom("ajouter"); ?></button>

        </div> 
    </div>

<div class='s21'>
        
        <div class='s211'>
            <h3><?php echo afficherTexteParNom("titre_caiman"); ?></h3>
            <p><?php echo afficherTexteParNom("par_caiman"); ?></p>
            <button class='btn1'><?php echo afficherTexteParNom("ajouter"); ?></button>
        </div>
                 <div class='im3'> <?php echo afficherImageParID(10); ?> </div>
           
    </div>

    <div class='s21'>
        <div class='im2'> <?php echo afficherImageParID(11); ?> </div>
        <div class='s211'>
            <h3><?php echo afficherTexteParNom("titre_sankara"); ?></h3>
            <p><?php echo afficherTexteParNom("par_sankara"); ?></p>
            <button class='btn1'><?php echo afficherTexteParNom("ajouter"); ?></button>

        </div> 
    </div>

    <div class='s21'>
        <div class='s211'>
            <h3><?php echo afficherTexteParNom("titre_cascade"); ?></h3>
            <p><?php echo afficherTexteParNom("par_cascade"); ?></p>
            <button class='btn1'><?php echo afficherTexteParNom("ajouter"); ?></button>
        </div>
                 <div class='im2'> <?php echo afficherImageParID(12); ?> </div>
           
    </div>

</section>

<section class='s3'>
    <div class='s31'>
    <div class='im4'> <?php echo afficherImageParID(13); ?> </div>
    <div class='im4'> <?php echo afficherImageParID(14); ?> </div>
    <div class='im4'> <?php echo afficherImageParID(15); ?> </div>
    </div>

<h2><?php echo afficherTexteParNom("titre_laongo"); ?></h2>
<p><?php echo afficherTexteParNom("par_laongo"); ?></p>
<button class='btn1'><?php echo afficherTexteParNom("ajouter"); ?></button>

</section>

<section class='s4'>
    <h2><?php echo afficherTexteParNom("titre_animaux"); ?></h2>
    <div class='s41'>
    <div class='im5'> <?php echo afficherImageParID(16); ?> </div>
    <div class='im5'> <?php echo afficherImageParID(17); ?> </div>
    <div class='im5'> <?php echo afficherImageParID(18); ?> </div>      
    </div>
    <div class='s41'>
    <div class='im5'> <?php echo afficherImageParID(19); ?> </div>
    <div class='im5'> <?php echo afficherImageParID(20); ?> </div>
    <div class='im5'> <?php echo afficherImageParID(21); ?> </div>      
    </div>
    <div class='s42'>
    <div class='im6'> <?php echo afficherImageParID(22); ?> </div>    
    </div>

    <button class='btn3'><?php echo afficherTexteParNom("visiter"); ?></button>
</section>


<?php include 'footer.php' ?>
</body>
</html>