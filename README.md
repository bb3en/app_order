
## APP mapping

**登入**login.html (session)

main.html [顯示今日日期、訂餐人數、已付款人數、點數餘額 ] 

1. **我要訂餐**(order.html) 
```
選擇日期[如果今日已訂餐則會提示已訂過]->選擇廠商->選擇餐點數量(至多2份)->選擇取貨點->送出(訂單成立)

```
2. **訂餐查詢與結帳**(ordersh.html) 
```
選擇訂單[可取消訂單,結帳後不可取消]->結帳->確認結帳->扣除餘額

```

3. **歷史記錄**(history.html)
    


## Database
```
會員
會員ID(PK),帳號,密碼,姓名,手機
```
```
廠商
廠商ID(PK),廠商名稱
```
```
菜單
菜單ID(PK),餐點名稱,價格,廠商ID(FK)
```
```
取餐地點
取餐地點ID(PK),地點名稱
```
```
訂購紀錄

訂單ID,訂單日期,廠商名稱,餐點名稱,價格,數量,總額,取餐地點,會員ID(FK)
```
## mapping image

<img src="http://bb3en.github.io/app_order/ts1.svg">

時序圖程式碼：
```
Title:訂餐系統地圖
Login->Main: 登入
Main->Order: 點餐
Order->NewOrder: 菜單
Main-->>Ordersh: 訂單查詢
Ordersh->orderdata:調資料
History->orderdata:調資料
Main-->>History: 歷史查詢
```