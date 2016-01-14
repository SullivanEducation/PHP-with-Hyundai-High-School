# 현대고 학생들과 함께하는 PHP 수업 4차시

###나만의 웹 페이지 만들어보기

## 개요

수업자료는 [SlideShare](http://www.slideshare.net/JeongUkJae/php-4)에 업로드 되어져 있습니다.

4차시에서는 PHP와 HTML을 합치고 FORM 에 관해서 배웁니다.

## 오픈 태그에 관하여

### Short Open Tag

 제가 php 오픈태그가 php.ini 에서 쇼트오픈태그 켜기로 두고 <?로 사용할 수 있다고 말씀드렸었습니다. <?php 라고 쓸 필요없이 간단하게 <? 라고만 쓰면 바로 php코드를 쓸 수 있어서 그렇게 하길 추천드리기도 하였습니다. 그런데 왜 굳이 그런것을 설정으로 둘까. 그냥 바로 <? 로 쓰면 좋지 않을까? 라고 생각하실 수도 있으십니다. 그 이유는 XML 과의 충돌때문이고, XML 에서 <?xml ... ?> 같은 형식으로 적히는 곳이 있기 떄문에 쇼트오픈태그를 선택으로 두게 되었습니다. XML 에 관한 설명은 [위키피디아](https://ko.wikipedia.org/wiki/XML) 또는 [w3schools](http://www.w3schools.com/xml/xml_whatis.asp) 에서 보실 수 있습니다.

밑의 인용문은 php.net 에서 가져온 것입니다.

> One reason to use long tags over short is to avoid confusion with <?xml ?> notation.

### Print Tag
 
수업시간에 인라인 태그라면서 사용한 태그가 있는데,

```php
<title><?=$title?></title>
```

 위와 같은 형식으로 사용을 한 태그인데, echo short tag 라고 불리는데, short tag 여도 php.ini 설정은 할 필요가 없습니다. php.net 에서 설정과 관련하여

> Since PHP 5.4 the inline echo <?= ?> short tags are always
> enabled regardless of the short\_open_tag (php.ini) setting.

라고 나와있습니다.

## Http Request

### Method

Http 메소드는 서버에 어떤 방식으로 요청할 것인지에 대한 정의이며 약속이다. 그러한 약속에 대하여 잘 나와있는 문서는 [w3c.com](http://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html) 이다. 우리는 수업에서 POST 와 GET 에 대하여만 알아보았는데, 너무 깊게 파고들고, 웹 서버를 직접 전부 짜지 않는 이상 나머지는 몰라도 큰 상관이 없을 것이라 여겨 나머지는 건너 뛰게 되었다.

 그러한 이유는 사실 대부분의 웹 서비스들이 GET 과 POST 만으로 짜여지는 경우가 많고, DELETE 같이 그나마 실제적으로 사용이 되는 것도 많은 서비스에서 GET/POST 로 대체되는 경우가 많다고 한다.

### Method - GET

 GET은 URL에 해당하는 자료의 전송을 요청하는 Method이며, 오로지 요청을 위해 사용하는 메소드이다. 하지만 원하는 변수값을 전달해야 하는 경우가 생기고, URL 에 해당하는 자료의 전송을 요청하다보니, 원하는 변수값들을 URL 에 담을 수 밖에 없게 되어서 ?(물음표) 뒤에 변수들을 나열하게 되었다.
 
### Method - POST
 
  POST는 우리가 서버에 무언가를 보내기 위한 Method 이며, 정보를 주기 위해 사용되는 Method이다. 그래서 원하는 변수값들을 따로 보내기 위한 방법 (http 프로토콜을 알아보면 요청하는 내용에 변수값들이 들어있을 것이다.) 이 있으며, 그래서 우리가 웹 브라우저로 볼 때에 어떤 값을 넘기는지 보이지 않는다.
  
  
## 미리 정의된 변수들

 이 부분과 관련하여 [php.net](http://php.net/manual/kr/reserved.variables.php) 에 잘 설명되어있으며, 중요한 변수들을 몇가지 소개했었고, 그 부분에 대해서 다시 설명하는 부분을 업로드한다.
 
### GET

 [php.net](http://php.net/manual/kr/reserved.variables.get.php) 에 역시 설명이 되어있고, 간단하게 말하자면 http get 변수들을 받아오는 배열이다. (배열에 관해서 진행을 하지 않고 나간 부분이여서 다소 놀란 부분이 있을 것이다. 앞으로 나올 개념이라 조만간 수업에서 설명을 할 예정이고, 미리 알아보고 싶은 사람들은 [php.net - array](http://php.net/manual/kr/book.array.php)를 참고하길 바란다.)
 
예제는 이렇다

```php
 <?php
 $name = $_GET['name'];
 echo "Hello, ".$name."!!";
 ?>
```

예제 코드는 넘어온 name 이란 변수를 받아서 Hello, JeongUkJae!! 과 같은 형식으로 출력시켜준다.

### POST

역시 [php.net](http://php.net/manual/kr/reserved.variables.post.php) 에 설명이 되어있고, GET 에서 알 수 있듯이 이 것도 Http post 변수를 받아오는 배열이다.

예제는 이렇다.

```php
<?php
$id = $_POST['id'];
echo "Your ID is ".$id."!";
?>
```
 
예제 코드는 넘어온 id 변수를 받아서 Your ID is jeongukjae! 와 같은 형식으로 출력시키는 예제이다.