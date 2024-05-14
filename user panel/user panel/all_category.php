<?php
    include("header.php");

?>
<h2 class="h2">Featured Category</h2>

<!-- Products -->
<section class="tiles">
    <?php
    $sql = "select * from category order by id asc";
    $result = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_assoc($result)){
    ?>
    <article class="style1">
        <span class="image">
        <?php
            echo "<img src=\"../../admin/images/category/{$rows['CategoryImage']} \" height=300px; width=300px>"
            ?>
        </span>
        <a href="product-details.html">
            <h2><?php echo $rows['CategoryName'] ?></h2>
            
            <p><del>$19.00</del> <strong>$19.00</strong></p>

            <p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
        </a>
    </article>
    <?php } ?>
</section>
<br>



<?php
    include("footer.php");

?>