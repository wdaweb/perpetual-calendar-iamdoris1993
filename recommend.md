# 建議事項
## perpetual01
1. 目錄下的主要檔案或第一個要執行的檔案儘量以index.php或index.html來命名
2. 儘量使用相對路徑來取代絕對路徑
```
  <a href="perpetual01.php?year=......
    改成
  <a href="?year=.....
```
3. `#top`區的圖片和文字無法完美垂直置中，做法請參考CSS修改的內容
4. 使用flex排版方式來說月曆維持在畫面的絕對中央，並且不受瀏灠器大小影響，做法請參考CSS修改的內容

## perpetual02
1. 目錄下的主要檔案或第一個要執行的檔案儘量以index.php或index.html來命名
2. 儘量使用相對路徑來取代絕對路徑
```
  <a href="perpetual02.php?year=......
    改成
  <a href="?year=.....
```
3. 修改`bg-bar.png`，裁切上下的空白空間，讓右上角的圖片可以頂到#main的最頂部
4. 使用flex排版來讓#main位於版面正中央，並可隨瀏灠器變化自動調整位置，做法請參考CSS修改的內容

## 其它
1. 建議在外層目錄做一個index.html檔，提供連結來快速查看兩份作品