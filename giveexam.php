<?php
include_once "header.php";

if (isset($_GET['exid']) && isset($_GET['qs'])) {
	$exid = $_GET['exid']; 
	$qsno = $_GET['qs']; 
}else{
	header("Location: examlist.php");
}

	$totalqs = $ex->getQuestionByExam($exid);
	$ques = $ex->getQuestionSingleQs($exid, $qsno);
	$question = $ques->fetch_assoc();

	//process answer
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$process = $ex->processAnswer($_POST,$exid);
	}
?>
<section class="giveexam">
    <div class="container obls_border obls_margin">
        <div class="row">
            <div class="col-md-6 examlistpad">
                <?php 
                    $exname = $ex->getExamById($exid);
                    $exinfo = $exname->fetch_assoc();
                ?>
                <h1 class="text-2xl font-bold">Exam Name: <?php echo $exinfo['name'];?></h1>
            </div>
            <div class="col-md-6 text-right examlistpad">
                <div>
                    <span id="timer" class="text-xl font-bold"></span>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-8 col-md-offset-2"  id="postdetails">
                <h2 class="text-2xl font-bold text-center">Question <?php echo $qsno; ?> of <?php echo $totalqs; ?></h2>
                <h3 class="text-xl font-semibold"><?php echo $question['ques']; ?></h3>
                <form accept-charset="UTF-8" role="form" action="" method="POST">
                    <fieldset>
                        <?php 
                            $getans = $ex->getAns($qsno, $exid);
                            while($ans = $getans->fetch_assoc()){
                        ?>
                        <div class="radio">
                            <label><input type="radio" name="answer" value="<?php echo $ans['id'];?>" required><?php echo $ans['ans'];?></label>
                        </div>
                        <?php } ?>
                        <input type="hidden" name="qsno" value="<?php echo $qsno; ?>">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4" type="submit">Next Question</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    // Timer logic
    window.onload = function() {
        var timer = document.getElementById("timer");
        var timeInSeconds = 600; // 10 minutes
        var minutes, seconds;

        var interval = setInterval(function() {
            minutes = parseInt(timeInSeconds / 60, 10);
            seconds = parseInt(timeInSeconds % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            timer.textContent = minutes + ":" + seconds;

            if (--timeInSeconds < 0) {
                clearInterval(interval);
                // Optionally, add logic to handle time out
            }
        }, 1000);
    };
</script>
