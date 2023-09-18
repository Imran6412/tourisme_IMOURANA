<nav class="header">
            <img class="im1" src="images/drapeau.png" alt="">
            <ul>
                <a href="accueil.php">accueil</a>
                <button id='redirection'>Inscription</button>
            </ul>
        </nav>


        <script>
            document.getElementById('redirection').addEventListener("click",function(){
                window.location.href='inscription.php';
            } );
        </script>


        <style>
            ul{
height: 60px;
margin-top: 30px;
}
.header a{
    font-size: 20px;
    color: white;
    padding: 50px;
    margin-left: 300px;
    text-decoration: none;
}
.header a:hover{
 color: rgb(255, 166, 0);
}
.header button{
    width: 150px;
    height: 40px;
    background: rgb(255, 166, 0);
    border-radius: 15px;
    border: 0;
    cursor: pointer;
}
.header button:hover{
    color:  rgb(255, 166, 0) ;
    background: white;
    cursor: pointer;
}
.im1{
    width: 150px;
    height: 70px;
    margin-left: 40px;
}
.header{
    display: flex;
    flex-direction: row;
    text-align: center;
    align-items: center;
    padding: -20px;
    width: 100%;
    background: black;
    position:relative;
    margin-top:-30px;
}





@media screen and (max-width:400px) {
    .header{
        display:flex;
        flex-direction:column;
        padding:-5px;
    }
    .header a{
        font-size:18px;
        padding:20px;
        margin-left:10px;
    }
}
        </style>