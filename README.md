
## APP mapping

Intro **登入**login.html (session)

0.index.html [顯示今日日期、訂餐人數、已付款人數、點數餘額 ]

1.**我要訂餐**(order.html) 
```
選擇日期[如果今日已訂餐則會提示已訂過]->選擇廠商,餐點數量(至多2份),取貨點->送出(訂單成立)

```
2.**訂餐查詢與結帳**(ordersh.html) 
```
選擇訂單[可取消訂單,結帳後不可取消]->結帳->確認結帳->扣除餘額

```

3**歷史記錄**(history.html)
    


## Database
```
會員[member]
會員ID(PK)[member_id],學號[member_acc],密碼[member_pass],姓名[member_name],身份[member_iden]
```
```
廠商[provide]
廠商ID(PK)[provide_id],廠商名稱[provide_name]
```
```
菜單[menu]
菜單ID(PK)[menu_id],餐點名稱[menu_name],價格[menu_price],廠商ID(FK)
```
```
取餐地點[region]
取餐地點ID(PK)[region_id],取餐地點[region_name]
```
```
客戶訂單[record]
客戶訂單ID(PK)[record_id],客戶訂單日期[record_date],客戶訂單狀態[record_status],取餐ID[region_id](FK),地點名稱[region_name],會員ID[member_id](FK)
```
```
客戶訂單紀錄[record_item]
客戶訂單紀錄流水號[member_id+record_id],客戶訂單ID(PK)[record_id](FK),菜單ID[menu_ID](FK),價格[menu_price],數量[item_q],廠商名稱[provide_name]
```
廠商訂單:每個廠商一天三張單,PHP歸集客戶訂單,三張單依三個地區分別
```
廠商訂單[check]
廠商訂單ID(PK)[check_id],廠商訂單狀態[check_status],廠商訂單總額[check_sum],廠商訂單日期[check_date],取餐地點ID[region_id](FK)
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