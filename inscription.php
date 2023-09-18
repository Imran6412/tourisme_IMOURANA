
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

<?php include 'header.php' ?>


<section class='sf'>
<h2><?php echo afficherTexteParNom("???"); ?> </h2>
<h3><?php echo afficherTexteParNom("venez"); ?></h3>
<p></p>
<h2><?php echo afficherTexteParNom("entree"); ?> </h2>
<div class='nour'>
<div class='nour1'>
<div class='im8'> <?php echo afficherImageParID(24); ?> </div>
<div class='im8'> <?php echo afficherImageParID(25); ?> </div>

</div>
<div class='nour2'>
<div class='im9'> <?php echo afficherImageParID(26); ?> </div>
<div class='im9'> <?php echo afficherImageParID(27); ?> </div>
<div class='im9'> <?php echo afficherImageParID(28); ?> </div>
<div class='im9'> <?php echo afficherImageParID(29); ?> </div>
</div>

<h2><?php echo afficherTexteParNom("grillade"); ?></h2>
<div class='nour1'>
<div class='im8'> <?php echo afficherImageParID(30); ?> </div>
<div class='im8'> <?php echo afficherImageParID(31); ?> </div>
</div>
<div class='n3'>
<div class='im10'> <?php echo afficherImageParID(32); ?> </div>
<div class='im10'> <?php echo afficherImageParID(33); ?> </div>
<div class='im10'> <?php echo afficherImageParID(34); ?> </div>
</div>

<h2><?php echo afficherTexteParNom("degue"); ?></h2>
<div class='nour1'>
<div class='im8'> <?php echo afficherImageParID(35); ?> </div>
<div class='im8'> <?php echo afficherImageParID(36); ?> </div>
</div>

<h2><?php echo afficherTexteParNom("dessert"); ?></h2>
<div class='n3'>
<div class='im10'> <?php echo afficherImageParID(37); ?> </div>
<div class='im10'> <?php echo afficherImageParID(38); ?> </div>
<div class='im10'> <?php echo afficherImageParID(39); ?> </div>
</div>

</div>

</section>


<h2 style="text-decoration:underline;">BIENVENU SUR LA PAGE D'INSCRIPTION</h2>

<div class='formulaire'>
    <div class='form'>
    <form method="post" action="">
        <label for="nom">Entrez votre nom</label><br>
        <input type="text" name='nom' placeholder='entrez votre nom'><br>

        <label for="prenom">Entrez votre prenom</label><br>
        <input type="text" name='prenom' placeholder='entrez votre prenom'><br>

        <label for="age">Entrez votre age</label><br>
        <input type="number" name="age" min=18 placeholder='entrez votre age'><br>

        <label for="gender">Sexe</label><br>
        
        <select name="genre" id="">
            <option value="masculin">masculin</option>
            <option value="feminin">feminin</option>
        </select><br>

        <input type="submit" name='envoyer' value="M'inscrire">
    </form>
    </div>
</div>







<?php include 'footer.php' ?>


<style>
    body{
        background:rgb(19 159 240);
    }
    h2{
        font-size:40px;
        margin-top:100px;
        text-align:center;
        text-decoration:underline;
    }
    .formulaire{
        text-align:center;
        font-size:20px;
        padding:50px;
        border:5px solid black;
        width:60%;
        margin-left:200px;
        border-radius:45px;
        box-shadow: 10px 10px 30px rgba(0, 0 ,0 ,0.8);
      
        background:rgb(48, 122, 255);
    }
    input{
        font-size:20px;
        padding:10px;
        border-radius:15px;
    }
    option{
        font-size:20px;
        padding:10px;
    }
    select{
        font-size:20px;
        padding:10px;
        padding-bottom:10px
    }
    .form{
        background:rgb(48, 122, 255);
        width:100%;
    }
    input[type="submit"]{
        border-radius:15px;
    }
    h3{
        font-size:30px;
    }
    .nour{
        display:flex;
        flex-direction:column;
        align-item:center;
    }
    .nour1{
        display:flex;
        flex-direction:row;
        justify-content:space-between;
        margin-left:50px;
        margin-right:50px;
    }
    .nour2{
        display:flex;
        flex-direction:row;
        justify-content:space-between;
        margin-bottom:50px;
        margin-left:10px;
        margin-right:10px;
    }
    .im8>img{
        width:500px;
        height:400px;
        margin-bottom:100px;
        box-shadow:5px 5px 20px black;
        
        
    }
    .im9>img{
        width:300px;
        height:300px;
        box-shadow:5px 5px 20px black;
    }
    .sf{
        background:rgb(120 199 245);
        color:white;
    }
.im10>img{
    width:400px;
        height:300px;
        margin-bottom:100px;
        box-shadow:5px 5px 20px black;
}
.n3{
    display:flex;
        flex-direction:row;
        justify-content:space-between;
        margin-bottom:50px;
        margin-left:10px;
        margin-right:10px;
}





</style>