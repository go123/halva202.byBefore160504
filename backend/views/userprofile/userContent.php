<?php

/* @var $this yii\web\View */

$this->title = 'DKD - admin';
?>
<div class="site-index">
	<p>скоро тут будет содержание of <?= $_POST['idUserValue'] ?></p>
	
	<div>
	<h1>Предметы</h1>
	<ul>
	<?php foreach ($modelLessonPlus as $lesson): ?>
		<li>
			<?= $lesson[0]['title'] ?>
			
			<br>
			Мнение преподавателя: <?= $lesson[2]['lesson_'.$lesson[0]['id'].'_TutorOpinion'] ?> 
			
			<br>
			Мнение ученика: <?= $lesson[2]['lesson_'.$lesson[0]['id'].'_PupilOpinion'] ?>
			
			<form action="" method="post">
			<input type="hidden" name="pupilWantChange">
			<input type="hidden" name="nameCol" value="<?= 'lesson_'.$lesson[0]['id'].'_TutorOpinionOpinion' ?>">
			<p><textarea rows="10" cols="45" name="textLesson"><?= $userprofile['lesson_'.$lesson[0]['id'].'_TutorOpinionOpinion'] ?></textarea></p>
			<p><input type="submit" value="Изменить мнение"></p>
			</form>
			
			<ul>
				<?php foreach ($lesson[1] as $lessonSection): ?>
				<li>
					<?= $lessonSection[0]['title'] ?> 
					
					<br>
					Мнение преподавателя: <?= $lesson[2]['sec'.$lessonSection[0]['id'].'TutorOpinion'] ?>
					
					<br>
					Мнение ученика: <?= $lesson[2]['sec'.$lessonSection[0]['id'].'PupilOpinion'] ?>
					
					<form action="" method="post">
					<input type="hidden" name="nameCol" value="<?= 'sec'.$lesson[0]['id'].'TutorOpinion' ?>">
					<p><textarea rows="10" cols="45" name="textSection"><?= $userprofile['sec'.$lesson[0]['id'].'TutorOpinion'] ?></textarea></p>
					<p><input type="submit" value="Изменить мнение"></p>
					</form>
			
					<ul>
						<?php foreach ($lessonSection[1] as $lessonSectionTopic): ?>
						<li>
							<?= $lessonSectionTopic['title'] ?>
							
							<br>
							Мнение преподавателя: <?= $lesson[2]['topic'.$lessonSectionTopic['id'].'TutorOpinion'] ?>
							
							<br>
							Мнение ученика: <?= $lesson[2]['topic'.$lessonSectionTopic['id'].'PupilOpinion'] ?>
							
							<form action="" method="post">
							<input type="hidden" name="nameCol" value="<?= 'topic'.$lessonSectionTopic['id'].'TutorOpinion' ?>">
							<p><textarea rows="10" cols="45" name="textTopic"><?= $userprofile['topic'.$lessonSectionTopic['id'].'TutorOpinion'] ?></textarea></p>
							<p><input type="submit" value="Изменить мнение"></p>
							</form>
							
							
					
						</li>
						<?php endforeach; ?>
					</ul>
					
				</li>
				<?php endforeach; ?>
			</ul>
		</li>
	<?php endforeach; ?>
	</ul>

	</div>
	
    
</div>
