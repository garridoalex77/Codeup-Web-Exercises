<!DOCTYPE html>
<html ng-app="sumUp">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <meta charset="utf-8">
    <title>Sum those digits</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
     integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
     crossorigin="anonymous">
     <link href='https://fonts.googleapis.com/css?family=Sriracha' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="/CSS/sumup.css">
</head>
<body>
    <div class="container">
        <div ng-controller="SumController">
            <h1>Sum of Some Number!</h1>
            <form novalidate>
                <label for="number">Number:</label>
                <input type="text" id="number" ng-model="number"></input>
                <button type="submit" class="btn btn-default">Sum It!</button>
            </form>
            <h2 ng-if="number != NaN">Sum me Up {{ sumMeUp() }} </h2>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="/JS/sumup.js"></script>
</body>
</html>
