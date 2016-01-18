# 현대고 학생들과 함께하는 PHP 수업 5차시

### 정보는 어떻게 관리되어질까?

## 개요

수업자료는 업로드 아직 되어져있지 않습니다.

5차시에서는 db 에 관해 배웁니다.

## RDBMS 와 Nosql 에 관한 추가 설명

 먼저 RDBMS(Relational DataBase Management Sysetm)은 한국어로 관계형 데이터베이스 관리 시스템정도인데, 데이터 사이의 관계를 정의해서 그 정의된 형식을 통해 데이터를 관리하게 해준다. 무슨 말인지 자세히 이해가 가지 않으면, 정규화된 데이터만을 받아들인다고 이해하면 될 것이다. 

 데이터A는 id, pw, 이름, 이메일에 관한 정보를 가지고 있는데, 갑자기 데이터B 는 그 이상의 정보. 나이라든가 전화번호라든가 갑자기 그 이상을 담을 수 없다는 말이다.

 그에 비해 Nosql 방식은 데이터간의 관계성을 중요시 하지 않는다. 오히려 그러한 관계성을 아예 신경쓰지 않는다고도 말할 수 있다.

 추가적인 설명은 다음과 같은 곳에서 볼 수 있다.

 [NoSQL vs SQL – Which is a Better Option?](https://blog.udemy.com/nosql-vs-sql-2/)

 [RDBMS vs. NoSQL: How do you pick?](http://www.zdnet.com/article/rdbms-vs-nosql-how-do-you-pick/)

## DB 문법들

### SELECT - [mysql dev](http://dev.mysql.com/doc/refman/5.7/en/select.html)