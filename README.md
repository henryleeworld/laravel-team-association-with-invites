# Laravel 12 團隊邀請

引入 mpociot 的 teamwork 套件來擴增邀請的用戶／團隊關聯，邀請團隊成員加入，並提供必需的資源與支援，讓團隊共同成長邁向成功。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 執行安裝 Vite 和 Laravel 擴充套件引用的依賴項目。
```sh
$ npm install
```
- 執行正式環境版本化資源管道並編譯。
```sh
$ npm run build
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/register` 來進行註冊。
- 完成註冊後，可以經由 `/login` 來進行登入。
- 完成登入後，可以經由 `/teams` 來進行隸屬團隊管理。

----

## 畫面截圖
![](https://i.imgur.com/OxAVZnf.png)
> 公司內部出現了各式各樣的團隊，從品管圈、新產品開發小組、到經營管理小組

![](https://i.imgur.com/OFCcOy0.png)
> 建立新團隊以立定志願完成一個共同的宗旨，達到一些明確具體的目標

![](https://i.imgur.com/F2YTMTJ.png)
> 填寫電子郵件以作邀請傳送邀請函
