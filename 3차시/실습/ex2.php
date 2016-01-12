<?php
# 변수 설정
$variable = 15;

# 만약 $variable 이 10 이상일 때
if($variable > 10) {
	# $i 를 0으로 선언하고 $variable보다 작으면 안의 내용을 실행하고 1을 더함.
	for($i = 0;$i < $variable;$i++) {
		echo "Hello, World!\n";
	}
}
?>