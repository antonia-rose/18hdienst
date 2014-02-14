<?php
    $kw = (int) date('W');
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de" ng-app="jobApp">
<head>
    <title>18 Uhr Dienst</title>

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" media="screen"  rel="stylesheet" type="text/css">
    <link href="css/screen.css" media="screen"  rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
</head>
<body ng-controller="jobCtrl" ng-init="init()">
    <div class="container">

        <h1>18 Uhr Dienst: Watson</h1>

        <div class="loading" ng-if="!allWeeks.length">
            Daten werden geladen...
        </div>

        <table ng-if="allWeeks.length">
            <tbody>
                <tr>
                    <td colspan="3">
                        <strong>F&uuml;r die Kalenderwoche <?php echo $kw; ?>:</strong>
                    </td>
                </tr>
                <tr ng-repeat="value in week" ng-class="(dayInWeek == ($index+1) ? 'current' : '')">
                    <td>
                        {{ value.day }}
                    </td>
                    <td>
                        {{ value.frontend }}
                    </td>
                    <td>
                        {{ value.backend }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <strong>F&uuml;r die Kalenderwoche <?php echo $kw+1; ?>:</strong>
                    </td>
                </tr>
                <tr ng-repeat="value in nextWeek">
                    <td>
                        {{ value.day }}
                    </td>
                    <td>
                        {{ value.frontend }}
                    </td>
                    <td>
                        {{ value.backend }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.12/angular.min.js"></script>
    <script src="js/jobAppController.js"></script>
    <script>
        var weekDay = <?php echo $kw; ?>;
    </script>
</body>
</html>

