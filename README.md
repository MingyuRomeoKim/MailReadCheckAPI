# Mail 단건 전송시, 메일 읽음 확인용 API 

- When your send email to user, the image source code in email html

# description
- 필수 로직들만 push 함.
- 라라벨 8version 이상 사용
- 발송된 이메일 내부에 심어져있는 img source가 로딩될 시 해당 API를 호출하게 됨.
- 형식은 <img src = http://127.0.0.1:8001/api/mail/readReceipt/eyJpdiI6InlSa0hhcnYrd1hDcnRCQ3RKTElxV1E9PSIsInZhbHVlIjoiUkNSMnB3Smwvb0tqUFdzbnBxMDdKdz09IiwibWFjIjoiNWU1MDhhOTg2MjM4OWMxZmExMDJlM2I4YjE5NThkMTJlMTdkYWZmMjc4Y2EzZWJiMzhjNDlkYmY1ZmEzNDA3MyIsInRhZyI6IiJ9.jpg />
- model의 database table은 유동적으로 사용하고자 하는것들로 체인지
