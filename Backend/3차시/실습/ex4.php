<?php
# 변수 설정
$variable = 15;

# 만약 $variable 이 10 이상일 때
if($variable >= 10) {
	# 일단 루프 돌리기
	for(;;) {
		if($variable < 0) {
			break;
		}
		echo "Hello, World!\n";
		$variable--;
	}
}
?>