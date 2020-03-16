<div class="main-container row">
  <div class="main-wrapper col-lg-8 offset-lg-2">
    <div class="note-container">
      <div class="tag tag-1"><p class="tag-icon-white"><i class="fas fa-home"></i></p></div>
      <div class="note note-1">
        <div class="note-wrapper">
          <h2 class="">How_to_use</h2>
          <p class="">(1) 緑色のタブから自分の作成した全てのnote一覧を閲覧することができます。</p>
          <p class="">(2) 青色のタブからnoteの新規作成ページへとアクセスできます。</p>
          <p class="">(3) 黄色のタブをクリックするとnoteの作成の説明ページが表示されます。</p>
          <p class="">(4) 上部のpublic_noteをクリックすると他ユーザーと自分が公開したnote一覧が表示されます。</p>
          <p class="">(5) 上部のmy_pageをクリックすると、このマイページへと戻ることができます。</p>
          <p class=""> 基本的な使い方の説明は以上です。黄色タブのnote作成手順を参照して自分に合ったnoteの使い方を探してみてください。</p>
          
          <div class="note-list-container">
            <div class="fixed-tag">
              <div class="fixed-tag-wrapper">
                <img class="fixed-tag-image" src="{{ secure_asset('https://storage-hal2.s3.ap-northeast-1.amazonaws.com/photos/note_image.0.png') }}">
                <p class="fixed-tag-para">noteを作成して写真をアップロードしていくと、右の写真のようにmy_pageが新着の写真で埋められていくので自分だけのmy_pageが出来上がっていきます</br>(写真をクリックすると拡大表示されます)</p>
              </div>
              <div class="fixed-tag-wrapper">
                <div class="fixed-photo"></div>
                <a class="description-photo" href="{{ secure_asset('https://storage-hal2.s3-ap-northeast-1.amazonaws.com/photos/photo_image1.png') }}"><img src="{{ secure_asset('https://storage-hal2.s3-ap-northeast-1.amazonaws.com/photos/photo_image1.png') }}" class="fixed-photo-image"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tag tag-2"><p class="tag-icon-black"><i class="fas fa-list"></i></p></div>
      <div class="note note-2">
        <div class="note-wrapper">
          <h2 class="">Note_List</h2>
          <p>各ジャンルごとにnoteがまとめられています。</p>
          <p>以下のジャンルから1つ選択すると、そのnote一覧が確認できます。</p>
          @foreach($genres as $genre)
            <h3 class="genre-name"><a href="{{ route('notes.show', ['id' => $genre->id ]) }}">{{ $genre->id }}. {{ $genre->genre }} <span>({{ $genre->belonging_notes()->where('user_id', Auth::id())->count() }})</span></a></h3>
            <p class="">詳細: {{ $genre->description }}</p>
          @endforeach
          
        </div>
      </div>
      <div class="tag tag-3"><p class="tag-icon-white"><i class="far fa-edit"></i></p></div>
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
      <div class="tag tag-4"><p class="tag-icon-black"><i class="fas fa-info-circle"></i></p></div>
      <div class="note note-4">
        <div class="note-wrapper">
          <h2 class="">Information</h2>
          <p>Titleの欄にnoteのタイトルを入力してください</p>
          <p>次に、Descriptionの欄にはnoteの説明文を入力してください</br>(この項目は入力しなくてもnoteは作成できます)</p>
          <p>Articleの欄には本文を入力してください</p>
          <p>Photosの欄には複数の写真を選択してアップロードすることができます</p>
          <p>写真の複数アップロードを行いたい場合はCtrlかShiftを押した状態でファイルをクリックすることで選択することができます</p>
          <p>noteの作成後、noteは非公開状態となっていますが、note詳細ページからshare/protectボタンで公開/非公開の状態を切り替えることができます</p>
          <div class="note-list-container">
            <div class="fixed-tag">
              <div class="fixed-tag-wrapper">
                <img class="fixed-tag-image" src="{{ secure_asset('https://storage-hal2.s3.ap-northeast-1.amazonaws.com/photos/note_image.0.png') }}">
                <p class="fixed-tag-para">右の写真のようにCtrl/Shiftキーを押した状態だとファイルを複数選択することができます</br>(1つのnoteにつき投稿できる写真は5枚までです)</p>
              </div>
              <div class="fixed-tag-wrapper">
                <div class="fixed-photo"></div>
                <a class="description-photo" href="{{ secure_asset('https://storage-hal2.s3-ap-northeast-1.amazonaws.com/photos/photo_image2.png') }}"><img src="{{ secure_asset('https://storage-hal2.s3-ap-northeast-1.amazonaws.com/photos/photo_image2.png') }}" class="fixed-photo-image"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
