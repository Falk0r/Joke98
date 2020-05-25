<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"  href="https://unpkg.com/98.css">
    <link rel="stylesheet" href="style.css">
    <title>Joke 98</title>
</head>
<?php require_once('./getData.php');
?>
<body>
    <main>
        <div class="window main" >
            <div class="title-bar inactive">
                <div class="title-bar-text">Joke 98</div>
                    <div class="title-bar-controls">
                    <button aria-label="Minimize"></button>
                    <button aria-label="Restore"></button>
                    <button aria-label="Close"></button>
                </div>
            </div>
            <div class="window-body" id="main">
                <h1>Bienvenu sur Joke 98</h1>
                <h2>Votre générateur de blagues aléatoires</h2>
                <div class="window content active" id="maxi">
                    <div class="title-bar" onmousedown="toMove(this)" onmouseup="toUnMove()" >
                        <div class="title-bar-text">Generate a joke</div>
                        <div class="title-bar-controls">
                            <button aria-label="Minimize" onclick="change()" ></button>
                            <button id="control" aria-label="Maximize" onclick="maximise()" ></button>
                            <button aria-label="Close" onclick="toClose()" ></button>
                        </div>
                    </div>
                    <div class="window-body">
                        <p>Cette boite de dialogue ne te rappelles rien ? Et oui il s'agit bien de windows 98. Si vous êtes née après 2000 vous n'avez pas connu cette fabuleuse période où microsoft nous livré son plus bel OS.</p>
                        <p>Mais assez parlé !</p>
                        <p>Place aux blagues. Nous avons préparé pour toi quelques devinette qui, je l'espère, te feront sourire et au mieux rigoler !</p>                        
                        <h3>Question :</h3>
                        <p><?= $data['question'] ?></p>
                        <div class="buttons">
                            <button onclick="answer()">Voir la réponse</button>
                            <button onclick="next()">Question suivante</button>
                        </div>
                        <div class="response-block">
                            <p class="response non-active"><?= $data['answer'] ?></p>
                        </div>                        

                    </div>
                </div>
            </div>
            <!-- Reduction de la fenetre -->
            <div class="window non-active" style="width: 300px" id="mini">
                <div class="title-bar inactive">
                    <div class="title-bar-text">Generate a joke</div>
                    <div class="title-bar-controls">
                    <button aria-label="Restore" onclick="change()" ></button>
                    <button aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div> 
    </main>

    <script src="./script.js"></script>
</body>
</html>