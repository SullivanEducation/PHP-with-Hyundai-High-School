<?php
# 변수 설정
$variable = 15;

# 만약 $variable 이 10 이상일 때
if($variable > 10) {
	# $variable이 0 내용 실행
	while($variable > 0) {
		echo "Hello, World!\n";

		# $variable 1 감소
		$variable -= 1;
		# $variable--;
		# $variable = $variable - 1;
	}
}
?>