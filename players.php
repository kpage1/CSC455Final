<?php 
	require './includes/header.php'; 
    require_once'../../../mysqli_connect.php';
    define('COLS', 2);
    define('ROWS', 3);
    $imgPerPage = COLS * ROWS;

    // get total number of images in db
    $sql1 = 'SELECT filename, player_name, height FROM player';
    $result=mysqli_query($dbc, $sql1);
    if ($result){
        $numImages = mysqli_num_rows($result);
        mysqli_free_result($result);
    }else{
        mysqli_error($dbc);
    }


    if (empty($_GET['page'])){
        $page = 1;
        $startNum = 0;
        $imgCounter = 1;
    }
    else {
        $page = filter_var($_GET['page'], FILTER_VALIDATE_INT);
        $startNum = ($page-1)*$imgPerPage;
        $imgCounter = ($page-1)*$imgPerPage+1;
    }
   
    // determing 2nd "display" parameter
    if($numImages < $page*$imgPerPage){
        $endNum = $numImages;
    }else{
        $endNum = $startNum+$imgPerPage;
    }


    $sql = "SELECT filename, player_name FROM player LIMIT $startNum, $imgPerPage";
    $result=mysqli_query($dbc, $sql);
    if ($result){
        $row = mysqli_fetch_assoc($result);
    }else{
        mysqli_error($dbc);
    }

    // Set main image
    if (isset($_GET['mainImage'])) {
        $mainImage = filter_var($_GET['mainImage'], FILTER_SANITIZE_STRING);
    } else {
        $mainImage = $row['filename'];
    }

?>
	<main>
		<p id="picCount">Displaying images <?="$imgCounter to $endNum of $numImages";?></p>
        <section id="gallery">
            <table id="thumbs">
                <tr>
                    <?php $pos=1;
                    do { ?>
					<!--This row needs to be repeated-->
                    <td><a href="gallery.php?mainImage=<?=$row['filename']?>&amp;page=<?=$page;?>"><img src="images/<?=$row['filename'];?>" alt="<?=$row['player_name'];?>" width="80" height="54"></a></td>
                    <?php 
                    if($pos == COLS){
                        echo '</tr><tr>';
                        $pos = 1;
                    }else {$pos++;}
                    // set main image caption of thumbnail is same as main image
                    if ($row['filename'] == $mainImage) {
                        $player_name = $row['player_name'];
                    } 
                } while ($row=mysqli_fetch_assoc($result));
            
                // if row is incomplete
                while ($pos++ <= COLS) {
                    echo '<td>&nbsp;</td>';
                }
                ?>
                </tr>

				<!-- Navigation link needs to go here -->
               <?php
                if($page > 1) {
                    $page--;
                    echo "<tr><td> <a href=\"gallery.php?page=$page\"> &lt;prev</a></td>";
                }else
                   {echo "<tr><td></td>";
               }
               // if blank cells are needed in this row for table symmetry
               for($i=1; $i <= COLS-2; $i++)
                echo "<td></td>";

                if($imgCounter < $numImages) {
                    $page++;
                    echo "<tr><td> <a href=\"gallery.php?page=$page\"> next&gt; </a></td></tr>";
                }else{
                    echo "<tr><td></td>";
                }
            
            mysqli_free_result($result);
            ?>
            </table>
            <figure id="main_image">
                <img src="images/<?=$mainImage?>" alt="<?php echo $mainImage ?>">
                <figcaption> <?= "$player_name ?> </figcaption>
            </figure>
        </section>
    </main>

<?php require './includes/footer.php'; ?>
