<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ST13 Predictor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<link rel="stylesheet" href="css/slider.css">
  <link rel="stylesheet" href="css/form.css">
	<style>
      .navbar
      {
        padding: 15px;
        padding-left: 100px;
      }
    </style>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="https://getbootstrap.com/docs/4.5/assets/brand/bootstrap-solid.svg" width="80" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="index.php">Predict</a>
        <a class="nav-item nav-link " href="saverecord.php">Save Record</a>
        <a class="nav-item nav-link" href="#">View Records</a>
      </div>
    </div>
  </nav><br />

  	<form method="post">
  		<label for="name" style="display: none;">Team Name</label>
  		<input type="hidden" name="teamName" placeholder="Team Name" autocomplete="off" spellcheck="false" id="name" class="form-control" value="LFC"><br />

      <label for="teamForm">Form</label>
      <input type="string" name="teamName" placeholder="1.5" autocomplete="off" spellcheck="false" id="teamForm" class="form-control" maxlength="4" ><br />

  		<label for="isHome">At Home?</label>
  		<select name="isHome" id="isHome" class="form-control">
  			<option>Yes</option>
  			<option>No</option>
  		</select>

  		<label for="strengthRange">Strength</label>
  		<input type="range" min="1" max="100" value="70" class="slider" id="strengthRange" >
  		<p><strong>Team Strength: <span id="demo"></span></strong></p>


  		<label for="haRecord">Home or Away PPG</label>
  		<input type="string" id="haRecord" placeholder="Home or Away PPG" autocomplete="off" spellcheck="false" maxlength="4" id="haRecord" class="form-control" /><br />


  		<label for="ins">Injuries & Suspensions</label>
  		<input type="string" id="ins" placeholder="Injuries or Suspensions" autocomplete="off" spellcheck="false" maxlength="2" id="ins" class="form-control half" />
  		<input type="string" id="fullSquad" placeholder="fullSquad" autocomplete="off" spellcheck="false" maxlength="2" class="form-control half" /><br />

  		<label for="odds">Odds</label>
  		<input type="string" id="odds" placeholder="odds e.g 2.3" autocomplete="off" spellcheck="false" maxlength="5" id="odds" class="form-control" /><br />

  		<label for="discipline">Discipline</label>
  		<input type="string" id="discipline" placeholder="discipline points" autocomplete="off" spellcheck="false" maxlength="3" id="discipline" class="form-control" /><br />

  		<label for="gamesPlayed">Games Played</label>
  		<input type="string" id="gamesPlayed" placeholder="Games Played e.g 21" autocomplete="off" spellcheck="false" maxlength="2" id="gamesPlayed" class="form-control" /><br />


  		<input type="submit" name="submit" value="Predict" class="btn btn-primary" onclick="getPredictions();return false;"/>
      <input type="reset" value="reset" class="btn btn-primary" />
  	</form>
  

  <script type="text/javascript" src="js/slider.js"></script>
  <script type="text/javascript">
    function getPredictions() 
    {
        let name = $('#name').val();
        let teamForm = $('#teamForm').val();
        let isHome = $('select[name="isHome"]').val();
        let teamStrength = $("#strengthRange").val();
        let haRecord = $('#haRecord').val();
        let ins = $('#ins').val();
        let fullSquad = $('#fullSquad').val();
        let odds = $('#odds').val();
        let discipline = $('#discipline').val();
        let gamesPlayed = $('#gamesPlayed').val();

         $.post("controller.php",
        {
            name: name,
            teamForm: teamForm,
            isHome: isHome,
            teamStrength: teamStrength,
            haRecord: haRecord,
            ins: [ins, fullSquad],
            odds: odds,
            discipline: discipline,
            gamesPlayed: gamesPlayed,
        },
        function(data, status){
            alert("Data: " + data);
            
        });
    }

  </script>
  </body>
</html>