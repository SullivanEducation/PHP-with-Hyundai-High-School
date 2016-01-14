#css 파일 적용하기
```html
<link rel="stylesheet" type="text/css" href="ch4.css">
```

#header 란?
* Web
	* head
	* body
		* header
		* article
		* footer

#form 이란?
frontend - html, css, js 

통신 (form 으로 backend 에게 발사)

backend - php 

#추가설명1
```css
#login input {
	width: 70%;
	padding: 5.5% 5%;
	border: none;
	border-bottom: 1px solid #CCC;
}
```

width가 70%인 선 / 높이가 0 

padding 으로 크기를 키움 좌우 5% 상하 5.5% 

아래로 가장자리로 1px 선을 그음

#추가설명2
```css
#login input
```
id login의 태그안에 있는 모든 input 태그에게 스타일 지정하기

```css
#login input[type=submit]
```
id login의 태그안에 있는 input 태그들 중에서 type이 submit 인 태그에게 스타일 지정하기