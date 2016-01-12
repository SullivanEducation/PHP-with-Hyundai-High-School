<?php
# 변수 설정
$variable = 15;

# 만약 $variable 이 10 이상일 때
if($variable > 10) {
	# $variable이 0 이상이면 1 감소시키고 안의 내용 실행
	while($variable-- > 0) {
		echo "Hello, World!\n";
	}
}
?>