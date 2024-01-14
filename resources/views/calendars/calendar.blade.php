<x-app-layout>
        <!-- 以下のdivタグ内にカレンダーを表示 -->
        <div id='calendar'></div>
        <a href='/'>タスク一覧</a>
</x-app-layout>
<style scoped>
/* 予定の上ではカーソルがポインターになる */
.fc-event-title-container{
    cursor: pointer;
}
</style>