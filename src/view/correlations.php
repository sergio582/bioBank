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
  <?php formCorrelation($phenotypes, TRUE, 'phenotypes') ?>
</div>

<?php
if (isset($_SESSION['datas'])) {
  $datas = $_SESSION['datas'];
?>
  <div class="container mt-3">
    <h3>Corrélations avec : <?php echo $_SESSION['phenotype1'] ?></h3>
    <?php tableCorrelations($_SESSION['datas']) ?>
  </div>
<?php
}
footView();
?>

<script>
  //js for jquery datatable
  $(document).ready(function() {
    table = $('#tableCorrelations').DataTable({
      "lengthMenu": [
        [10, 25, 50, 100, 200, -1],
        [10, 25, 50, 100, 200, "Tout"]
      ],
      "pageLength": 10,
      "language": {
        "paginate": {
          "next": "Suivante",
          "previous": "Précédente"
        },
        "search": "Rechercher"
      }
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>