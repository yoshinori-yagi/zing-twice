/*
 * Tetris v0.7
 *  Created by Shuichi Takeda at 2014-07-11
 */
 
/* ------- 開発履歴
    v0.7        画面中央にゲームを配置。変数名等の見直し。関数の見直し
    v0.6.1.1    ラインが揃ったら消える処理追加（点滅して消えるエフェクト）
            ブロックが消えたら上のブロックから詰める処理追加
    v0.6.1  処理を一から作り直し（余計な部分が多いため。シンプルにした）
    v0.6        スペースキーを押すと、ブロックが回転する（ブロックが壁にめり込んでしまう）
    v0.5        テトリスのブロックがランダムに落ちてきて、積み重なる
*/
 
/*
 * 定数
 */
// ステージ
var BLOCK_SIZE = 22;        // 1ブロックのサイズ
var BLOCK_RAWS = 22;    // ステージの高さ（20ライン分をステージとして使用し、上下1ラインはあたり判定とブロックコピー用に使用）
var BLOCK_COLS = 12;    // ステージの幅
var SCREEN_WIDTH = BLOCK_SIZE * BLOCK_COLS; // キャンバスの幅
var SCREEN_HEIGHT = BLOCK_SIZE * BLOCK_RAWS;    // キャンバスの高さ
// ゲームの状態
var GAME = 1;           // ゲーム中
var GAMEOVER = 0;       // ゲームオーバー時
var EFFECT = 2;         // ブロックを消すときのエフェクトモード
// ブロックの状態
var NON_BLOCK = 0;      // ブロックが存在しない
var NORMAL_BLOCK = 1;// 通常のブロック（動かせる）
var NORMAL_BLOCK2 = 8; 
var NORMAL_BLOCK3 = 7; 
var NORMAL_BLOCK4 = 6; 
var NORMAL_BLOCK5 = 5;
var NORMAL_BLOCK6 = 4;
var LOCK_BLOCK = 2;     // ロックした（動かせない）ブロック
var CLEAR_BLOCK = 3;    // 消去するブロック（1ライン揃ったとき）
var WALL = 9;           // 壁
// エフェクト
var EFFECT_ANIMATION = 2;   // エフェクト時のちかちかする回数
// 色
var BACK_COLOR = "#ddd";            // 背景色
var GAMEOVER_COLOR = "#000";// ゲームオーバー時のブロックの色
var BLOCK_COLOR = "#610B5E";           // 操作ブロックの色
var BLOCK_COLOR2 = "#FF8000";
var BLOCK_COLOR3 = "#00FF00";
var BLOCK_COLOR4 = "#FF00BF";           // 操作ブロックの色
var BLOCK_COLOR5 = "#FFFF00";
var BLOCK_COLOR6 = "#9A2EFE";
var LOCK_COLOR = "#fff";            // ロックしたブロックの色
var WALL_COLOR = "#666";            // 壁の色
var ERROR_COLOR = "#f00";           // エラーブロックの色
var EFFECT_COLOR1 = "#fff";         // エフェクト時の色1
var EFFECT_COLOR2 = "#000";         // エフェクト時の色2
// ゲーム要素
var NEXTLEVEL = 1;                 // 次のレベルまでの消去ライン数
 
/*
 * グローバル変数
 */
var canvas = null;                      // キャンバス取得
var g = null;                           // コンテキスト取得
var stage = new Array(BLOCK_COLS);  // ゲームのステージ枠（壁の情報のみ、変化しない）
var field = new Array(BLOCK_COLS);      // ゲーム中のステージ枠とブロック表示用（変化する）
var bs;                             // ブロックサイズ
var speed;                          // 落下速度
var frame;                          // ゲームフレーム番号
var block = new Array();                // 落ちてくるブロックの種類（７種類）
var oBlock = new Array();               // 操作中のブロック
var blockType;                      // ブロックの種類番号
var x, y;                               // ブロックの現在位置
var sx, sy;                         // ブロックの元位置
var mode;                           // ゲームの状態  GAME/GAMEOVER/EFFECT
var timer1;                         // ゲームループ用のタイマー
var FPS;                                // 描画書き換え速度
var clearLine;                          // 消去したライン数
// エフェクト時（色の反転/エフェクトスピード/エフェクト回数）
var effectState = {flipFlop: 0, speed: 0, count: 0};

var count = 0;
var point = 0; 
/*
 * 初期化
 */
function init(){
    clearTimeout(timer1);
    FPS = 30;
    clearLine = 0;
    // キャンバスの設定
    canvas = document.getElementById("canvas");
    canvas.width = SCREEN_WIDTH;
    canvas.height = SCREEN_HEIGHT;
    g = canvas.getContext("2d");
    // エフェクト設定
    effectState.flipFlop = 0;
    effectState.speed = 4;
    effectState.count = 0;
    // ブロックの設定
    bs = BLOCK_SIZE;
    // ブロックを設定
    block =  [[ [0, 0, 0, 0],
                [0, 8, 8, 0],
                [0, 8, 8, 0],
                [0, 0, 0, 0]],
                 
            [   [0, 7, 0, 0],
                [0, 7, 0, 0],
                [0, 7, 0, 0],
                [0, 7, 0, 0]],
 
            [   [0, 0, 6, 0],
                [0, 6, 6, 0],
                [0, 6, 0, 0],
                [0, 0, 0, 0]],
 
            [   [0, 5, 0, 0],
                [0, 5, 5, 0],
                [0, 0, 5, 0],
                [0, 0, 0, 0]],
 
            [   [0, 0, 0, 0],
                [0, 4, 4, 0],
                [0, 4, 0, 0],
                [0, 4, 0, 0]],
 
            [   [0, 0, 0, 0],
                [0, 5, 5, 0],
                [0, 0, 5, 0],
                [0, 0, 5, 0]],
 
            [   [0, 0, 0, 0],
                [0, 8, 0, 0],
                [8, 8, 8, 0],
                [0, 0, 0, 0]],
                
                
            [   [7, 0, 0, 0],
                [7, 0, 0, 0],
                [7, 7, 7, 7],
                [0, 0, 0, 0]],
                
             [  [6, 0, 0, 6],
                [6, 0, 0, 6],
                [6, 6, 6, 6],
                [0, 0, 0, 0]],
            ];
    // ステージを設定
    stage = [
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],   // ←表示しない
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9],
            [9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]];  // ←表示しない
}
 
/*
 * ステージ設定
 */
function setStage(){
    // 表示するための配列
    for(var i=0; i<BLOCK_RAWS; i++){
        field[i] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    }
    // 操作ブロックための配列
    oBlock = [  [0,0,0,0],
                [0,0,0,0],
                [0,0,0,0],
                [0,0,0,0]
            ];
    // ステージデータをコピーする
    for(i=0; i<BLOCK_RAWS; i++){
        for(j=0; j<BLOCK_COLS; j++){
            field[i][j] = stage[i][j];
        }
    }
}
 
/*
 * ゲーム開始処理
 */
function newGame(){
    setStage();
    mode = GAME;
    frame = 1;
    speed = 12;
    clearTimeout(timer1);
    createBlock();
    mainLoop();
    timeUP();
}
 
/*
 * 新しいブロックを作成
 */
function createBlock(){
    if(mode == EFFECT) return;
    x = sx = Math.floor(BLOCK_COLS / 3);
    y = sy = 0;
    blockType = Math.floor(Math.random()*9);
    // ブロックをコピー
    for(i=0; i<4; i++){
        for(j=0; j<4; j++){
            oBlock[i][j] = block[blockType][i][j];
        }
    }
     
    if(hitCheck()){
        mode = GAMEOVER;
        /*document.write("GAME OVER!!");*/
        console.log("GAMEOVER!");
    }
    putBlock();
}
 
/*
 * ブロックをロック（動かせないように）する
 */
function lockBlock(){
    if(mode == EFFECT) return;
    for(var i=0; i<4; i++){
        for(var j=0; j<4; j++){
            if(oBlock[i][j]) field[i+y][j+x] = NORMAL_BLOCK;
        }
    }
}
 
/*
 * ブロックをステージにセットする
 */
function putBlock(){
    if(mode == EFFECT) return;
    for(var i=0; i<4; i++){
        for(var j=0; j<4; j++){
            if(oBlock[i][j])    field[i+y][j+x] = oBlock[i][j];
        }
    }
}
 
/*
 * ブロックを消去する
 */
function clearBlock(){
    if(mode == EFFECT) return;
    for(var i=0; i<4; i++){
        for(var j=0; j<4; j++){
            if(oBlock[i][j]) field[i+y][j+x] = NON_BLOCK;
        }
    }
}
 
/*
 * ブロックの回転処理
 */
function rotateBlock(){
    if(mode == EFFECT) return;
    clearBlock();
    // 回転ブロック退避の配列
    var tBlock = [  [0,0,0,0],
                [0,0,0,0],
                [0,0,0,0],
                [0,0,0,0]
            ];
    // ブロックを退避
    for(var i=0; i<4; i++){
        for(var j=0; j<4; j++){
            tBlock[i][j] = oBlock[i][j];
        }
    }
    // ブロックを回転
    for(var i=0; i<4; i++){
        for(var j=0; j<4; j++){
            oBlock[i][j] = tBlock[3-j][i];
        }
    }
    if(hitCheck()){
        // 元に戻す
        for(var i=0; i<4; i++){
            for(var j=0; j<4; j++){
                oBlock[i][j] = tBlock[i][j];
            }
        }
    }
    putBlock();
    return 0;
}
 
/*
 * ブロックの当たり判定処理（移動できるか？落下できるか？）
 */
function hitCheck(){
    if(mode == EFFECT) return;
    for(var i=0; i<4; i++){
        for(var j=0; j<4; j++){
            if(field[i+y][j+x] && oBlock[i][j])     return 1;
        }
    }
    return 0;
}
 
/*
 * ラインが揃ったかチェックする
 */
function lineCheck(){
    if(mode == EFFECT) return;
    var count;
    var lineCount = 0;          // 何ライン揃ったか？
    for(i=1; i<BLOCK_RAWS-2; i++){
        count = 0;  // 1ライン上に揃ったブロックの数
        for(j=0; j<BLOCK_COLS; j++){     // 右端からチェック
            if(field[i][j]) count++;
            else break;
        }
        if(count >= BLOCK_COLS){     // 1ライン揃った！
            lineCount++;
            clearLine++;
            for(j=1; j<BLOCK_COLS-1; j++) field[i][j] = CLEAR_BLOCK;     // 消去ブロックにする
            console.log("lineCount = " + lineCount);
            console.log("clearLine = " + clearLine);
        }
    }
    
    score = document.getElementById("score");
    point+=lineCount*100;
    score.innerHTML = point;
    saveScore(point);
    return lineCount;
    
    
}

/*
 * そろったラインを消去する
 */
function deleteLine(){
    if(mode == EFFECT) return;
    for(var i=BLOCK_RAWS-1; i>=1; i--){      // 下のラインから消去する
        for(var j=1; j<BLOCK_COLS-1; j++){   // 右端からチェック
            if(field[i][j] == CLEAR_BLOCK){
                field[i][j] = field[i-1][j];            // 一段落とす
                for(var above=i-1; above>=1; above--){   //  そこからまた上を一段ずつおとしていく
                    field[above][j] = field[above-1][j];
                }
                i++;        // 落としたラインもまた、消去ラインだったときの対処
            }
        }
    }
}
 
/*
 * ゲーム画面クリア
 */
function clearWindow(){
    g.fillStyle = BACK_COLOR;
    g.fillRect(0, 0, SCREEN_WIDTH, SCREEN_HEIGHT);
};
 
/*
 * 描画処理
 */
function draw(){
    clearWindow();
     
    for(var i=0; i<BLOCK_RAWS; i++){
        for(var j=0; j<BLOCK_COLS; j++){
            switch(field[i][j]){
                case NON_BLOCK:     // なにもない
                    g.fillStyle = BACK_COLOR;
                    break;
                case NORMAL_BLOCK:      // ブロック
                    g.fillStyle = BLOCK_COLOR;
                    break;
                case NORMAL_BLOCK2:      // ブロック
                    g.fillStyle = BLOCK_COLOR2;
                    break;
                case NORMAL_BLOCK3:      // ブロック
                    g.fillStyle = BLOCK_COLOR3;
                    break;
                case NORMAL_BLOCK4:      // ブロック
                    g.fillStyle = BLOCK_COLOR4;
                    break;
                case NORMAL_BLOCK5:      // ブロック
                    g.fillStyle = BLOCK_COLOR5;
                    break;
                case NORMAL_BLOCK6:      // ブロック
                    g.fillStyle = BLOCK_COLOR6;
                    break;
                case LOCK_BLOCK:        // ブロック（ロック）
                    g.fillStyle = LOCK_COLOR;
                    break;
                case CLEAR_BLOCK:       // 消去ブロック
                    g.fillStyle = LOCK_COLOR;
                    break;
                case WALL:      // 壁
                    g.fillStyle = WALL_COLOR;
                    break;
                default:        // 重なったときの色
                    g.fillStyle = ERROR_COLOR;
            }
            g.fillRect(j*bs, i*bs, bs-1, bs-1);    // 1引いているのはブロック同士の隙間を入れるため
        }
    }
}
 
/*
 * ラインを消去するときのエフェクト
 */
function effect(){
    var colors = [ EFFECT_COLOR1, EFFECT_COLOR2 ];
     
    g.fillStyle = colors[effectState.flipFlop];
    for(var i=0; i<BLOCK_RAWS; i++){
        for(var j=0; j<BLOCK_COLS; j++){
            if(field[i][j] == CLEAR_BLOCK){     // 消去ブロックならエフェクト表示
                g.fillRect(j*bs, i*bs, bs-1, bs-1);
            }
        }
    }
    effectState.flipFlop = 1 - effectState.flipFlop;    // エフェクト色を交互に切り替え
     
    if(effectState.count > EFFECT_ANIMATION){
        mode = GAME;
        effectState.count = 0;
        effectState.flipFlop = 0;
        deleteLine();
        createBlock();
    }
    effectState.count++;
}
 
/*
 * ゲームオーバー処理
 */
function gameOver(){
    for(var i=0; i<BLOCK_RAWS; i++){
        for(var j=0; j<BLOCK_COLS; j++){
            if(field[i][j] && field[i][j] != WALL){ // ブロックのみ色を変える
                g.fillStyle = GAMEOVER_COLOR;
                g.fillRect(j*bs, i*bs, bs-1, bs-1);
            }
        }
    }
}
 
/*
 * ゲームメイン
 */
function mainLoop(){
    if(mode == GAME){
        sx = x; sy = y;     // 元の位置を保存
        if(frame % speed == 0){ // ブロックが落下する間隔
            clearBlock();
            y++;
            if(hitCheck()){
                y = sy;
                lockBlock();
                if(lineCheck() > 0){
                    mode = EFFECT;
                }
                createBlock();
            }
            putBlock();
        }
        draw();
    }
    else if(mode == GAMEOVER){
        gameOver();
    }
    else if(mode == EFFECT){
        if(frame % effectState.speed == 0){
            effect();
        }
    }
    frame++;
    // 落下スピードアップ
    if(clearLine >= NEXTLEVEL){
        clearLine = 0;
        speed = speed - 2;

    }
    if(speed < 1) speed = 1;
    timer1 = setTimeout(mainLoop, 1000/FPS);

}
 
function timeUP(){

    count = 120; 
    timerID = setInterval('countup()',1000); //1秒毎にcountup()を呼び出し
   
   
}

function countup() {
    
	 count--;
	 if(count<=0){ 
         count=0;
         mode = GAMEOVER;
     }   
	
     time = document.getElementById("time");
     time.innerHTML = count;
     
   
} 
 
function saveScore(point) {
    $.ajax(
        "../../../api/games/tetoris/result",{
            type: "POST",
            dataType: 'text',
            data: {
                    "point" : point,
            },
            global: false,
            success: function(post){
                console.dir(post);
            },
            error : function() { 
                console.log("era-desuyo");
            },
            complete: function() {
                console.log("読み込みＯＫ");
            }
        }
    );
    }
    
 
/*
 * キーボードイベント
 */
window.onkeydown = keyDownFunc;
 
/*
 * 操作
 */
function keyDownFunc(e){
    if(mode == EFFECT) return;
    if(mode == GAME){
        clearBlock();
        sx = x; sy = y;
        if(e.keyCode == 32){
            rotateBlock();
        }
        else if(e.keyCode == 37){
            x--;
        }
        else if(e.keyCode == 39){
            x++;
        }
        else if(e.keyCode == 40){
            y++;
        }
        if(hitCheck()){
            x = sx; y = sy;
        }
        putBlock();
    }
    else if(mode == GAMEOVER){
        if(e.keyCode == 13){
            newGame();
        }
    }
}

var myfunc1 = function () {
    rotateBlock();
}
var myfunc2 = function () {
      clearBlock();
      sx = x; sy = y;
      x--;
    }
var myfunc3 = function () {
      clearBlock();
      sx = x; sy = y;
      x++;
    }
var myfunc4 = function () {
      clearBlock();
      sx = x; sy = y;
      y++;
    }


 

/*
 * 起動処理
 */
window.onload = function(){
    init();
    newGame();
};


/* block kuzushi*/

// ゲームシステム変数
var game = {
   ctx: null,
   time: 0,
   status: 'play',
   pos: {
       x: 0,
       y: 0
   },
   fps: 30,
   cvs: {
       width: 640,
       height: 480
   }, // キャンバス：サイズ
   paddle: {
       size: 150,
       color: '#00dd00'
   }, // パドル：サイズ, 色
   ball: {
       size: 10,
       speed: 5,
       x: 320  + Math.floor(Math.random()*11) * 10,
       y: 240,
       color: '#dd0000'
   }, // ボール：サイズ, 速さ, 色
   block: {
       size: 5,
       speed: 5,
       x: 0,
       y: 0,
       row: 10,
       col: 14,
       color: '#00aa00',
       strokeColor: '#003300'
   }, // ブロック：サイズ, 速さ, 色(内部), 色(外枠)
   background: {
       color: '#001100'
   }, // 背景: 色
   score: {
       point: 0,
       color: '#00aa00'
   },
  NEXTLEVEL: {
     
  },
  clearLine:{
     
  }
};

// パドル管理用のクラス
function Paddle() {
   this.initialize.apply(this, arguments);
}
Paddle.prototype = {
   size: 0,
   x: 0,
   y: 0,
   // コンストラクタ
   initialize: function (option) {
       this.size = option.size;
   },
   // 移動
   move: function (x, y) {
       this.x = x;
       this.y = y;
       if (this.x < 0) {
           this.x = 0;
       }
       if (this.x > game.cvs.width) {
           this.x = game.cvs.width;
       }
   },
   // 描画
   draw: function () {
       game.ctx.fillStyle = game.paddle.color;
       game.ctx.fillRect(this.x - (this.size / 2), this.y, this.size, 10);
   }
};

// ボール管理用のクラス
function Ball() {
   this.initialize.apply(this, arguments);
}
Ball.prototype = {
   size: 0,
   x: 0,
   y: 0,
   dx: 0,
   dy: 0,
   // コンストラクタ
   initialize: function (option) {
       this.size = option.size;
       this.x = option.x;
       this.y = option.y;
       this.dx = option.speed;
       this.dy = option.speed;
   },
   // スピードアップ
   speedUp: function (value) {
           if (this.dx < 0) {
               this.dx = -value;    
           } else {
               this.dx = value;
           }
           
           if (this.dy < 0) {
               this.dy = -value;
           } else {
               this.dy = value;
           }
   },
   // 移動テスト
   moveTest: function () {
       return {
           x: this.x + this.dx,
           y: this.y + this.dy
       };
   },
   // 移動
   move: function () {
       var pos = this.moveTest();
       if (pos.x < this.size || pos.x > game.cvs.width - this.size) {
           this.dx *= -1;
       }
       if (pos.y < this.size) {
           this.dy *= -1;
       }
       this.x += this.dx;
       this.y += this.dy;
   },
   // 描画
   draw: function () {
       game.ctx.fillStyle = game.ball.color;
       game.ctx.beginPath();
       game.ctx.arc(this.x, this.y, this.size, 0, 2 * Math.PI, false);
       game.ctx.fill();
       game.ctx.closePath();
   }
};

// ブロック管理用のクラス
function Block() {
   this.initialize.apply(this, arguments);
}
Block.prototype = {
   x: 0,
   y: 0,
   w: 0,
   h: 0,
   flag: true,
   // コンストラクタ
   initialize: function (option) {
       this.x = option.x;
       this.y = option.y;
       this.w = option.w;
       this.h = option.h;
   },
   // 描画
   draw: function () {
       if (this.flag) {
           game.ctx.fillStyle = game.block.color;
           game.ctx.fillRect(this.x, this.y, this.w, this.h);
           game.ctx.strokeStyle = game.block.strokeColor;
           game.ctx.strokeRect(this.x, this.y, this.w, this.h);
       }
   }
};

// マウスイベント
window.addEventListener('mousedown', function (e) {}, false);
window.addEventListener('mousemove', function (e) {
   var rect = e.target.getBoundingClientRect();
   game.pos.x = e.clientX - rect.left;
   game.pos.y = e.clientY - rect.top;
}, false);

// ブロックの初期化
function initBlocks() {
   var blocks = [];
   var col = game.block.col;
   var row = game.block.row;
   for (var i = 0; i < row; i++) {
       for (var j = 0; j < col; j++) {
           blocks[i * col + j] = new Block({
               x: 40 + j * 40,
               y: 40 + i * 20,
w: 40,
               h: 20
           });
       }
   }
   return blocks;
}


function main() {
 document.getElementById("disp").style.visibility = "hidden";

   
   var cvs = document.getElementById('sample');
   
   game.ctx = cvs.getContext('2d');
   // ボール初期化
   var ball = new Ball({
       size: game.ball.size,
       x: 0,
       y: 0,
       speed: game.ball.speed
   });
   ball.x = game.ball.x;
   ball.y = game.ball.y;
   ball.dx = game.ball.speed;
   ball.dy = game.ball.speed;
   // パドル初期化
   var paddle = new Paddle({
       size: game.paddle.size
   });
   // ブロック初期化
   blocks = initBlocks();
   // アニメーション
   setInterval(function () {
       var col = game.block.col; // ブロックの列数
       var row = game.block.row; // ブロックの行数
       if (game.status != 'play') {
           game.ctx.fillStyle = game.background.color;
           game.ctx.fillRect(0, 0, game.cvs.width, game.cvs.height);
           game.ctx.fillStyle = '#aa0000';
           game.ctx.font = '60px "Arial Black"';
           if (game.status == 'gameover') {
               game.ctx.fillText('Game Over', 160, 230);
               game.ctx.fillText('Score : ' + game.score.point, 160, 320);
           } else if (game.status == 'clear') {
               game.ctx.fillText('Game Clear', 160, 230);
               game.ctx.fillText('Score : ' + game.score.point, 160, 320);
           }
           return;
       }
       game.time++; // 時間加算
       game.ctx.clearRect(0, 0, game.cvs.width, game.cvs.height); // キャンバスクリア
       game.ctx.fillStyle = '#001100'; // キャンバスを塗りつぶす
       game.ctx.fillRect(0, 0, game.cvs.width, game.cvs.height);
       paddle.move(game.pos.x, game.cvs.height - 40); // パドル移動
       // パドル当たり判定
       if (ball.y >= paddle.y - ball.size && ball.y <= paddle.y + ball.size && ball.x >= paddle.x - (paddle.size / 2) && ball.x <= paddle.x + (paddle.size / 2)) {
           ball.dy *= -1;
       }
       
       if (game.score.point >= 100) {
           ball.speedUp(15);
       } else if (game.score.point >= 50) {
           ball.speedUp(10);
       } else if (game.score.point >= 20) {
           ball.speedUp(7);
       }
       
       // ボール移動テスト
       var pos = ball.moveTest();
       // ブロック当たり判定
       for (var i = 0; i < row; i++) {
           for (var j = 0; j < col; j++) {
               if (blocks[i * col + j].flag) {
                   // 左からヒット
                   if (ball.x <= blocks[i * col + j].x && blocks[i * col + j].x <= pos.x && pos.y >= blocks[i * col + j].y && pos.y <= blocks[i * col + j].y + blocks[i * col + j].h) {
                        ball.dx *= -1;
                        blocks[i * col + j].flag = false;
                        game.score.point += 5;
                        
                   }
                   // 右からヒット
                   if (pos.x <= blocks[i * col + j].x + blocks[i * col + j].w && blocks[i * col + j].x + blocks[i * col + j].w <= ball.x && pos.y >= blocks[i * col + j].y && pos.y <= blocks[i * col + j].y + blocks[i * col + j].h) {
                       ball.dx *= -1;
                       blocks[i * col + j].flag = false;
                       game.score.point += 5;
                      
                   }
                   // 上からヒット
                   if (ball.y <= blocks[i * col + j].y && blocks[i * col + j].y <= pos.y && pos.x >= blocks[i * col + j].x && pos.x <= blocks[i * col + j].x + blocks[i * col + j].w) {
                        ball.dy *= -1;
                        blocks[i * col + j].flag = false;
                        game.score.point += 10;
                        
                   }
                   // 下からヒット
                   if (pos.y <= blocks[i * col + j].y + blocks[i * col + j].h && blocks[i * col + j].y + blocks[i * col + j].h <= ball.y && pos.x >= blocks[i * col + j].x && pos.x <= blocks[i * col + j].x + blocks[i * col + j].w) {
                       ball.dy *= -1;
                       blocks[i * col + j].flag = false;
                       game.score.point += 1;
                   }
               }
           }
       }
       ball.move(); // ボール移動
       // アウト判定
       if (ball.y >= game.cvs.height - ball.size) {
           game.status = 'gameover';
           
           saveBlockScore();
           
       }
       var flag = true; // クリア判定
       for (var i = 0; i < row; i++) {
           for (var j = 0; j < col; j++) {
               if (blocks[i * col + j].flag) {
                   flag = false;
               }
           }
       }
       if (flag) {
           game.status = 'clear';
           
           //score hozon
           
       } // クリア状態に
       paddle.draw(); //バドル描画
       ball.draw(); //ボール描画
       // ブロック描画
       for (var i = 0; i < row; i++) {
           for (var j = 0; j < col; j++) {
               blocks[i * col + j].draw();
           }
       }
       // スコア描画
       game.ctx.fillStyle = game.score.color;
       game.ctx.font = '30px "Arial Black"';
       game.ctx.fillText('score : ' + game.score.point, 10, game.cvs.height - 10);
       
       
       
       
       
     
}, parseInt(1000 / game.fps));
   }



function saveBlockScore() {
    var BlockScore = game.score.point;
    $.ajax(
        "../../../api/games/block/result",{
            type: "POST",
            dataType: 'json',
            data: {
                    "BlockScore" : BlockScore,
            },
            global: false,
            success: function(post){
                console.dir(post);
            },
            error : function() { 
                console.log("era-desuyo");
            },
            complete: function() {
                console.log("読み込みＯＫ");
            }
        }
    );
    }


/* Jquery */

$(function() {
    
    $('tribe_index_red').click(function() {
        $('tribe_red').show();
        $('tribe_yellow').hide();
        $('tribe_pink').hide();
        $('tribe_purple').hide();
    });
    
    $('tribe_index_yellow').click(function() {
        $('tribe_yellow').fadeIn();
        $('tribe_red').hide();
        $('tribe_pink').hide();
        $('tribe_purple').hide();
    });
    
    $('tribe_index_pink').click(function() {
        $('tribe_pink').show();
        $('tribe_yellow').hide();
        $('tribe_red').hide();
        $('tribe_purple').hide();
    });
    
    $('tribe_index_purple').click(function() {
        $('tribe_purple').show();
        $('tribe_yellow').hide();
        $('tribe_pink').hide();
        $('tribe_red').hide();
    });

/* Slide show*/
  function toggleChangeBtn() {
    var slideIndex = $('.slide').index($('.active'));
    $('.change-btn').show();
    
    if (slideIndex == 0) {
      $('.prev-btn').hide();
    
    } else if (slideIndex == $('.slide').length - 1) {
      $('.next-btn').hide();
    }
  }
  
  $('.index-btn').click(function() {
    $('.active').removeClass('active');
    var clickedIndex = $('.index-btn').index($(this));
    $('.slide').eq(clickedIndex).addClass('active');
    toggleChangeBtn();
  });
  
  $('.change-btn').click(function() {
    var $displaySlide = $('.active');
    $displaySlide.removeClass('active');
    
    if ($(this).hasClass('next-btn')) {
      $displaySlide.next().addClass('active');
    } else {
      $displaySlide.prev().addClass('active');
    }
    toggleChangeBtn();
  });
  
/* seat number hover action */
/*  $('.seat').hover(
    function(){
      $(this).animate({
        'font-size':'50px'
      },300)
    },
    function(){
      $(this).animate({
        'font-size':'40px'
      },300)
    }
  );
  
  $('.btn-lg').hover(
    function(){
      $(this).animate({
        'font-size':'35px'
      },300)
    },
    function(){
      $(this).animate({
        'font-size':'25px'
      },300)
    }
  );
*/ 
  $('.number_result').click(function() {
      $(this).hide();
      $('.numbers').fadeIn();
  })
  
  
  
  /*team name hover*/
    $('.seat1').hover(
          function(){
              $('.select-team').hide()
              $('.team1').show()
          },
          function(){
              $('.team1').hide()
                $('.select-team').show()
          }
    );
    $('.seat2').hover(
          function(){
              $('.select-team').hide()
              $('.team2').show()
          },
          function(){
              $('.team2').hide()
                $('.select-team').show()
          }
    );
    $('.seat3').hover(
          function(){
              $('.select-team').hide()
              $('.team3').show()
          },
          function(){
              $('.team3').hide()
                $('.select-team').show()
          }
    );
    $('.seat4').hover(
          function(){
              $('.select-team').hide()
              $('.team4').show()
          },
          function(){
              $('.team4').hide()
                $('.select-team').show()
          }
    );        
    $('.seat5').hover(
          function(){
              $('.select-team').hide()
              $('.team5').show()
          },
          function(){
              $('.team5').hide()
                $('.select-team').show()
          }
    );    
    $('.seat6').hover(
          function(){
              $('.select-team').hide()
              $('.team6').show()
          },
          function(){
              $('.team6').hide()
                $('.select-team').show()
          }
    );  
    $('.seat7').hover(
          function(){
              $('.select-team').hide()
              $('.team7').show()
          },
          function(){
              $('.team7').hide()
                $('.select-team').show()
          }
    );  
    $('.seat8').hover(
          function(){
              $('.select-team').hide()
              $('.team8').show()
          },
          function(){
              $('.team8').hide()
                $('.select-team').show()
          }
    );  
    $('.seat9').hover(
          function(){
              $('.select-team').hide()
              $('.team9').show()
          },
          function(){
              $('.team9').hide()
                $('.select-team').show()
          }
    );  
    $('.seat10').hover(
          function(){
              $('.select-team').hide()
              $('.team10').show()
          },
          function(){
              $('.team10').hide()
                $('.select-team').show()
          }
    );
    $('.seat11').hover(
          function(){
              $('.select-team').hide()
              $('.team11').show()
          },
          function(){
              $('.team11').hide()
                $('.select-team').show()
          }
    );
    $('.seat12').hover(
          function(){
              $('.select-team').hide()
              $('.team12').show()
          },
          function(){
              $('.team12').hide()
                $('.select-team').show()
          }
    );
    $('.seat13').hover(
          function(){
              $('.select-team').hide()
              $('.team13').show()
          },
          function(){
              $('.team13').hide()
                $('.select-team').show()
          }
    );        
    $('.seat14').hover(
          function(){
              $('.select-team').hide()
              $('.team14').show()
          },
          function(){
              $('.team14').hide()
                $('.select-team').show()
          }
    );    
    $('.seat15').hover(
          function(){
              $('.select-team').hide()
              $('.team15').show()
          },
          function(){
              $('.team15').hide()
                $('.select-team').show()
          }
    );  
    $('.seat16').hover(
          function(){
              $('.select-team').hide()
              $('.team16').show()
          },
          function(){
              $('.team16').hide()
                $('.select-team').show()
          }
    );  
    $('.seat17').hover(
          function(){
              $('.select-team').hide()
              $('.team17').show()
          },
          function(){
              $('.team17').hide()
                $('.select-team').show()
          }
    );  
    $('.seat18').hover(
          function(){
              $('.select-team').hide()
              $('.team18').show()
          },
          function(){
              $('.team18').hide()
                $('.select-team').show()
          }
    );  
    $('.seat19').hover(
          function(){
              $('.select-team').hide()
              $('.team19').show()
          },
          function(){
              $('.team19').hide()
                $('.select-team').show()
          }
    );
    $('.seat20').hover(
          function(){
              $('.select-team').hide()
              $('.team20').show()
          },
          function(){
              $('.team20').hide()
                $('.select-team').show()
          }
    );
    $('.seat21').hover(
          function(){
              $('.select-team').hide()
              $('.team21').show()
          },
          function(){
              $('.team21').hide()
                $('.select-team').show()
          }
    );
    $('.seat22').hover(
          function(){
              $('.select-team').hide()
              $('.team22').show()
          },
          function(){
              $('.team22').hide()
                $('.select-team').show()
          }
    );        
    $('.seat23').hover(
          function(){
              $('.select-team').hide()
              $('.team23').show()
          },
          function(){
              $('.team23').hide()
                $('.select-team').show()
          }
    );
    $('.seat24').hover(
      function(){
          $('.select-team').hide()
          $('.team24').show()
      },
      function(){
          $('.team24').hide()
            $('.select-team').show()
      }
    );  
    $('.seat25').hover(
          function(){
              $('.select-team').hide()
              $('.team25').show()
          },
          function(){
              $('.team25').hide()
                $('.select-team').show()
          }
          );  
    $('.seat26').hover(
          function(){
              $('.select-team').hide()
              $('.team26').show()
          },
          function(){
              $('.team26').hide()
                $('.select-team').show()
          }
          );  
    $('.seat27').hover(
          function(){
              $('.select-team').hide()
              $('.team27').show()
          },
          function(){
              $('.team27').hide()
                $('.select-team').show()
          }
          );  
    $('.seat28').hover(
          function(){
              $('.select-team').hide()
              $('.team28').show()
          },
          function(){
              $('.team28').hide()
                $('.select-team').show()
          }
          );
    $('.seat29').hover(
          function(){
              $('.select-team').hide()
              $('.team29').show()
          },
          function(){
              $('.team29').hide()
                $('.select-team').show()
          }
          );
    $('.seat30').hover(
          function(){
              $('.select-team').hide()
              $('.team30').show()
          },
          function(){
              $('.team30').hide()
                $('.select-team').show()
          }
          );
    $('.seat31').hover(
          function(){
              $('.select-team').hide()
              $('.team31').show()
          },
          function(){
              $('.team31').hide()
                $('.select-team').show()
          }
          );        
    $('.seat32').hover(
          function(){
              $('.select-team').hide()
              $('.team32').show()
          },
          function(){
              $('.team32').hide()
                $('.select-team').show()
          }
          );    
    $('.seat33').hover(
          function(){
              $('.select-team').hide()
              $('.team33').show()
          },
          function(){
              $('.team33').hide()
                $('.select-team').show()
          }
          );  
    $('.seat34').hover(
          function(){
              $('.select-team').hide()
              $('.team34').show()
          },
          function(){
              $('.team34').hide()
                $('.select-team').show()
          }
          );  
    $('.seat35').hover(
          function(){
              $('.select-team').hide()
              $('.team35').show()
          },
          function(){
              $('.team35').hide()
                $('.select-team').show()
          }
          );  
    $('.seat36').hover(
          function(){
              $('.select-team').hide()
              $('.team36').show()
          },
          function(){
              $('.team36').hide()
                $('.select-team').show()
          }
          );  
    $('.seat37').hover(
          function(){
              $('.select-team').hide()
              $('.team37').show()
          },
          function(){
              $('.team37').hide()
                $('.select-team').show()
          }
          );
    $('.seat38').hover(
          function(){
              $('.select-team').hide()
              $('.team38').show()
          },
          function(){
              $('.team38').hide()
                $('.select-team').show()
          }
          );
    $('.seat39').hover(
          function(){
              $('.select-team').hide()
              $('.team39').show()
          },
          function(){
              $('.team39').hide()
                $('.select-team').show()
          }
          );
    $('.seat40').hover(
          function(){
              $('.select-team').hide()
              $('.team40').show()
          },
          function(){
              $('.team40').hide()
                $('.select-team').show()
          }
          );        
    $('.seat41').hover(
          function(){
              $('.select-team').hide()
              $('.team41').show()
          },
          function(){
              $('.team41').hide()
                $('.select-team').show()
          }
          );    
    $('.seat42').hover(
          function(){
              $('.select-team').hide()
              $('.team42').show()
          },
          function(){
              $('.team42').hide()
                $('.select-team').show()
          }
          );  
    $('.seat43').hover(
          function(){
              $('.select-team').hide()
              $('.team43').show()
          },
          function(){
              $('.team43').hide()
                $('.select-team').show()
          }
          );  
    $('.seat44').hover(
          function(){
              $('.select-team').hide()
              $('.team44').show()
          },
          function(){
              $('.team44').hide()
                $('.select-team').show()
          }
          );  
    $('.seat45').hover(
          function(){
              $('.select-team').hide()
              $('.team45').show()
          },
          function(){
              $('.team45').hide()
                $('.select-team').show()
          }
          );
    $('.character').hover(
          function(){
              $('.information').show()
          },
          function(){
              $('.information').hide()
          }
    );   
    
    
/* seat color hover */


 $('.seat1').hover(
        function(){
            $('.red').css('background-color','LightCoral ')
            $('.seat1').css('background-color','crimson').css('box-shadow','2px 2px brown')
        },
        
        function(){
            $('.red').css('background-color','white').css('box-shadow', '1px 2px crimson')
        }
    ); 
    $('.seat2').hover(
        function(){
            $('.red').css('background-color','LightCoral ')
            $('.seat2').css('background-color','crimson').css('box-shadow','2px 2px brown')
        },
        
        function(){
            $('.red').css('background-color','white').css('box-shadow', '1px 2px crimson')
        }
    ); 
    $('.seat3').hover(
        function(){
            $('.red').css('background-color','LightCoral ')
            $('.seat3').css('background-color','crimson').css('box-shadow','2px 2px brown')
        },
        
        function(){
            $('.red').css('background-color','white').css('box-shadow', '1px 2px crimson')
        }
    ); 
    $('.seat4').hover(
        function(){
            $('.red').css('background-color','LightCoral ')
            $('.seat4').css('background-color','crimson').css('box-shadow','2px 2px brown')
        },
        
        function(){
            $('.red').css('background-color','white').css('box-shadow', '1px 2px crimson')
        }
    ); 
    $('.seat5').hover(
        function(){
            $('.red').css('background-color','LightCoral ')
            $('.seat5').css('background-color','crimson').css('box-shadow','2px 2px brown')
        },
        
        function(){
            $('.red').css('background-color','white').css('box-shadow', '1px 2px crimson')
        }
    ); 
    $('.seat6').hover(
        function(){
            $('.red').css('background-color','LightCoral ')
            $('.seat6').css('background-color','crimson').css('box-shadow','2px 2px brown')
        },
        
        function(){
            $('.red').css('background-color','white').css('box-shadow', '1px 2px crimson')
        }
    ); 
    $('.seat7').hover(
        function(){
            $('.red').css('background-color','LightCoral ')
            $('.seat7').css('background-color','crimson').css('box-shadow','2px 2px brown')
        },
        
        function(){
            $('.red').css('background-color','white').css('box-shadow', '1px 2px crimson')
        }
    ); 
    $('.seat8').hover(
        function(){
            $('.red').css('background-color','LightCoral ')
            $('.seat8').css('background-color','crimson').css('box-shadow','2px 2px brown')
        },
        
        function(){
            $('.red').css('background-color','white').css('box-shadow', '1px 2px crimson')
        }
    ); 
    $('.seat9').hover(
        function(){
            $('.red').css('background-color','LightCoral ')
            $('.seat9').css('background-color','crimson').css('box-shadow','2px 2px brown')
        },
        
        function(){
            $('.red').css('background-color','white').css('box-shadow', '1px 2px crimson')
        }
    ); 
   
          
     $('.seat10').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat10').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    ); 
     $('.seat11').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat11').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
     $('.seat12').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat12').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
     $('.seat13').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat13').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
     $('.seat14').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat14').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
     $('.seat15').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat15').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
     $('.seat16').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat16').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
     $('.seat17').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat17').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
     $('.seat18').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat18').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
     $('.seat19').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat19').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );       $('.seat20').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat20').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
     $('.seat21').hover(
        function(){
            $('.yellow').css('background-color','lightyellow')
            $('.seat21').css('background-color','gold').css('box-shadow','2px 2px  GoldenRod')
        },
        
        function(){
            $('.yellow').css('background-color','white').css('box-shadow', '1px 2px gold')
        }
    );      
    $('.seat22').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat22').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      
    $('.seat23').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat23').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      
    $('.seat24').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat24').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      
    $('.seat25').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat25').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      
    $('.seat26').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat26').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      $('.seat27').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat27').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      $('.seat28').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat28').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      $('.seat29').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat29').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      
    $('.seat30').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat30').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      
    $('.seat31').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat31').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      
    $('.seat32').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat32').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      
    $('.seat33').hover(
        function(){
            $('.pink').css('background-color','MistyRose')
            $('.seat33').css('background-color','hotpink').css('box-shadow','2px 2px DeepPink')
        },
        
        function(){
            $('.pink').css('background-color','white').css('box-shadow', '1px 2px hotpink')
        }
    );      
    $('.seat34').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat34').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat35').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat35').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat36').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat36').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat37').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat37').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat38').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat38').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat39').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat39').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat40').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat40').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat41').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat41').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat42').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat42').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat43').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat43').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat44').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat44').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );      
   $('.seat45').hover(
        function(){
            $('.purple').css('background-color','Plum')
            $('.seat45').css('background-color','MediumOrchid').css('box-shadow','2px 2px DarkOrchid')
        },
        
        function(){
            $('.purple').css('background-color','white').css('box-shadow', '1px 2px MediumOrchid')
        }
    );
    
    
    
    
    $('.seats_mini').hover(
    function() {
      $(this).find('.seat_mini{{$user_id_seat}}').addClass('black');
      
    },
    function() {
      $(this).find('.seat_mini{{$user_id_seat}}').removeClass('black');
      
    }
  );
});


    $('.seats_mini').hover(
    function() {
      $(this).find('.seat_mini6').addClass('black');
      
    },
    function() {
      // Find the "text-contents" elements, then remove the "text-active" class
      $(this).find('.seat_mini6').removeClass('black');
      
    }
  );
   
   