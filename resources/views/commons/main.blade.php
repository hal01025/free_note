<div class="main-outer">
  <div class="main-container">  
    <div class="main-wrapper">
      <div class="tag tag-1"></div>
      <div class="note note-1">
        <div class="note-wrapper">
          <h2 class="">How_to_use</h2>
          <p class="">(1) 緑色のタブをクリックすると自分の作成した全てのnote一覧が表示されます。</p>
          <p class="">(2) 青色のタブをクリックするとnoteの新規作成ページが表示されます。</p>
          <p class="">(3) 黄色のタブをクリックするとnoteの作成に関する見本ページが表示されます。</p>
          <p class="">(4) 上部のpublic_noteをクリックすると他ユーザーが公開したnote一覧が表示されます。</p>
          <p class="">(5) 上部のmy_pageをクリックすると、このマイページへと戻ることができます。</p>
          <p class=""> 基本的な使い方の説明は以上です。note作成の見本を参照して自分に合った使い方を探してみてください。</p>
          <img src="" class="">
          <div class="note-list-container">
            
            <div class="fixed-tag">
              <div class="fixed-tag-wrapper">
                <img class="fixed-tag-image" src="images/note-147951_1280.png">
                <p class="fixed-tag-para">ここにメモの内容を記述できるようにする・もしくは新着のノートを表示する？</p>
              </div>
            </div>
            
            <div class="fixed-tag">
              <div class="fixed-tag-wrapper">
                <img class="fixed-tag-image" src="images/note-147951_1280.png">
                <p class="fixed-tag-para">ここにメモの内容を記述できるようにする・もしくは新着のノートを表示する？</p>
              </div>
            </div>
            
            <div class="fixed-tag">
              <div class="fixed-tag-wrapper">
                <img class="fixed-tag-image" src="images/note-147951_1280.png">
                <p class="fixed-tag-para">ここにメモの内容を記述できるようにする・もしくは新着のノートを表示する？</p>
              </div>
            </div>
            
            <div class="fixed-tag">
              <div class="fixed-tag-wrapper">
                <img class="fixed-tag-image" src="images/note-147951_1280.png">
                <p class="fixed-tag-para">ここにメモの内容を記述できるようにする・もしくは新着のノートを表示する？</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="tag tag-2"></div>
      <div class="note note-2">
        <div class="note-wrapper">
          <h2 class="">Note_List</h2>
          <p>各ジャンルごとにnoteがまとめられています。</p>
          <p>以下のジャンルから1つ選択すると、そのnote一覧が確認できます。</p>
          @foreach($genres as $genre)
            <h3><a href="{{ route('notes.show', ['id' => $genre->id ]) }}">{{ $genre->id }}. {{ $genre->genre }} <span>({{ $genre->belonging_notes()->count() }})</span></a></h3>
            <p class="">詳細: {{ $genre->description }}</p>
          @endforeach
          
        </div>
      </div>
      <div class="tag tag-3"></div>
      <div class="note note-3">
        <div class="note-wrapper">
          <h2 class="">New_Note</h2>
          <p>各ジャンルごとにnoteの作成ができます。</p>
          <p>以下のジャンルから1つを選択してnoteを作成して下さい。</p>
          @foreach($genres as $genre)
          <h3><a href="{{ route('notes.create', ['id' => $genre->id, ]) }}">{{ $genre->id }}. {{ $genre->genre }}_note</a></h3>
          <p class="">詳細: {{ $genre->description }}</p>
        @endforeach
        </div>
      </div>
      <div class="tag tag-4"></div>
      <div class="note note-4">
        <div class="note-wrapper">
          <h2 class="">Information</h2>
          <p>Titleの欄にnoteのタイトルを入力してください</p>
          <p>次に、Descriptionの欄にはnoteの説明文を入力してください(この項目は入力しなくてもnoteは作成できます)</p>
        </div>
      </div>
    </div>
    
    <div class="background-decoration"></div>
  </div>
</div>