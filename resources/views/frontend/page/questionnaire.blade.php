<!DOCTYPE html>
<html>
<head>
  <title>Ma page frontend</title>
  <style>
    .cadre-questions {
      display: none;
      transition: opacity 0.5s;
      opacity: 0;
    }

    .cadre-questions.active {
      display: block;
      opacity: 1;
    }
  </style>
</head>
<body>
  <button id="commencerButton">Commencer</button>

  <div id="cadreQuestions" class="cadre-questions">
    <h2>Questions</h2>

    <label for="prestataire">
      <input type="radio" name="choix" id="prestataire"> Êtes-vous un prestataire ?
    </label>

    <label for="organisateur">
      <input type="radio" name="choix" id="organisateur"> Êtes-vous un organisateur ?
    </label>

    <button id="submitQuestions">Soumettre</button>
  </div>

  <script>
    var commencerButton = document.getElementById("commencerButton");
    var cadreQuestions = document.getElementById("cadreQuestions");
    var submitButton = document.getElementById("submitQuestions");

    commencerButton.addEventListener("click", function() {
      commencerButton.style.display = "none";
      cadreQuestions.classList.add("active");
      startTimer();
    });

    submitButton.addEventListener("click", function() {
      var prestataire = document.getElementById("prestataire").checked;
      var organisateur = document.getElementById("organisateur").checked;

      if (!prestataire && !organisateur) {
        // Aucun choix n'a été fait, rediriger vers la page client
        window.location.href = '/aucun-choix';
      } else if (prestataire) {
        // Rediriger vers la page du prestataire
        window.location.href = '/prestataire';
      } else if (organisateur) {
        // Rediriger vers la page de l'organisateur
        window.location.href = '/organisateur';
      }
    });

    function startTimer() {
      var secondsRemaining = 15;

      var countdown = setInterval(function() {
        secondsRemaining--;

        if (secondsRemaining <= 0) {
          clearInterval(countdown);
          resetForm();
        }
      }, 1000);
    }

    function resetForm() {
      commencerButton.style.display = "block";
      cadreQuestions.classList.remove("active");
      document.getElementById("prestataire").checked = false;
      document.getElementById("organisateur").checked = false;
    }
  </script>
</body>
</html>
