<section class="list">
    <section class="container">
        <h2>List Cerita</h2>
        <p>List cerita yang dapat kamu baca</p>
        <section class="list-grid">
            <?php
            $itemPerPage = 20;
            $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $start = ($page > 1) ? ($page * $itemPerPage) - $itemPerPage : 0;
            $previousPage = $page - 1;
            $nextPage = $page + 1;

            $data = $db->query("SELECT * FROM cerita ORDER BY id_cerita DESC LIMIT $start, $itemPerPage");

            $query = $db->query("SELECT * FROM cerita");
            $total = mysqli_num_rows($query);
            $pages = ceil($total / $itemPerPage);

            if (mysqli_num_rows($data) > 0) {
                while ($row = $data->fetch_assoc()) {
                    $comment = $db->query("SELECT * FROM komentar WHERE id_crt='".$row['id_cerita']."'");
            ?>

            <section class="grid-item">
                <img src="<?=$web_url; ?>assets/img/thumbnail-cerita/<?= $row["foto_cerita"]; ?>" alt="Cerita 1" class="grid-item-thumbnail">
                <a href="<?=$web_url; ?>cerita/?cerita_id=<?= base64_encode($row["id_cerita"]); ?>" class="grid-item-body">
                    <h3><?= $row["judul_cerita"]; ?></h3>
                    <p><?= $row["deskripsi_cerita"]; ?></p>
                    <small class="grid-item-author"><img src="https://cdn.statically.io/avatar/shape=circle/<?= $row["pencipta_cerita"]; ?>" alt="<?= $row["pencipta_cerita"]; ?>" class="icon"> <?= $row["pencipta_cerita"]; ?></small>
                    <section class="grid-item-bottom">
                        <small><i class="icon far fa-thumbs-up"></i> <?= $row['cerita_like']; ?></small>
                        <small><i class="icon far fa-comment"></i> <?= mysqli_num_rows($comment); ?></small>
                    </section>
                </a>
            </section>
            
            <?php
                }
            }
            ?>
        </section>
        <ul class="list-pageination">
            <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li><a href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
            <?php } ?>

            <li><a <?php if ($page < $pages) { echo "href='?halaman=$next"; }; ?>>&raquo;</a></li>
        </ul>
    </section>
</section>