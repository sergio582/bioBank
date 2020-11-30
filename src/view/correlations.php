<?php
include_once('src/view/part/_header.php');
include_once('src/view/part/_formsCorrelations.php');
include_once('src/view/part/_tableCorrelations.php');
include_once('src/model/Phenotype.php');

$phenotypes = Phenotype::getAll();

headView('Corrélations');
navigation('correlations');

?>
<div class="container">
  <h1 class="text-secondary mt-3"><i class="fas fa-dna text-info"></i> Phénotypes <button type="button" class="btn btn-light" data-toggle="collapse" data-target="#phenotypes"><i class="fas fa-sort-down"></i></button></h1>
  <?php switchFormCorrelation($phenotypes, TRUE, 'phenotypes') ?>
</div>

<?php
if (isset($_SESSION['datas'])) {
  $datas = $_SESSION['datas'];
?>
  <div class="container">
    <canvas id="correlationChart" height="150"></canvas>
  </div>
  <div class="container mt-3">
    <?php tableCorrelations($_SESSION['datas']) ?>
  </div>
<?php
}
footView();
?>

<!-- js for jquery datatable -->
<script>
  $(document).ready(function() {
    table = $('#tableCorrelations').DataTable({
      "lengthMenu": [
        [10, 25, 50, 100, 200, -1],
        [10, 25, 50, 100, 200, "Tout"]
      ],
      "pageLength": -1,
      "language": {
        "paginate": {
          "next": "Suivante",
          "previous": "Précédente"
        },
        "search": "Rechercher"
      }
    });
    $('.dataTables_length').addClass('bs-select');

    datas = []

    $.ajax({
      type: "POST",
      url: "control/correlations",
      data: {
        get_ajax: ""
      },
      dataType: 'json',

      success: function(results) {
        x = 0
        results.forEach(element => datas.push({
          x: x++,
          y: parseFloat(element['rg']) * 100
        }))
      }
    });

    //set graph
    var scatterChartData = {
      datasets: [{
        label: 'My First dataset',
        borderColor: 'rgba(78, 83, 240, 0.1)',
        backgroundColor: 'rgba(78, 83, 240, 0.1)',
        data: datas
      }]
    };

    var ctx = document.getElementById('correlationChart').getContext('2d');
    window.myScatter = Chart.Scatter(ctx, {
      data: scatterChartData,
      options: {
        scales: {
          yAxes: [{
            ticks: {
              suggestedMin: -100,
              suggestedMax: 100
            }
          }],
          xAxes: [{
            ticks: {
              suggestedMin: 0,
              suggestedMax: 700
            }
          }]
        }
      }
    });
  });
</script>