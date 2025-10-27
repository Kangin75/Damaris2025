<?php
session_start();
// xiangqi.php - single-file Chinese Chess (象棋) game
// Serves HTML, CSS and JavaScript. Game logic runs on the client (JS).
// PHP is used to deliver the page and can persist a simple history in session if desired.

// Initial board representation (10 rows x 9 cols). We'll use a 2D array of piece codes.
// Uppercase = Red, lowercase = Black. Empty = '.'
// Piece letters: R=Rook(車), N=Knight(馬), B=Elephant/Minister(相/象), A=Advisor(仕/士), K=General(帥/將), C=Cannon(炮/砲), P=Pawn(兵/卒)
$initial = [
    ['r','n','b','a','k','a','b','n','r'],
    ['.','.','.','.','.','.','.','.','.'],
    ['.','c','.','.','.','.','.','c','.'],
    ['p','.','p','.','p','.','p','.','p'],
    ['.','.','.','.','.','.','.','.','.'],
    ['.','.','.','.','.','.','.','.','.'],
    ['P','.','P','.','P','.','P','.','P'],
    ['.','C','.','.','.','.','.','C','.'],
    ['.','.','.','.','.','.','.','.','.'],
    ['R','N','B','A','K','A','B','N','R']
];

// Convert to JSON for embedding in JS
$initial_json = json_encode($initial);

?>
<!doctype html>
<html lang="zh-Hant">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>象棋 (Xiangqi) — PHP + HTML + JavaScript</title>
  <style>
    body{font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Noto Sans CJK TC", "PingFang TC", "Microsoft JhengHei", sans-serif; background:#f8f6ef; padding:18px}
    h1{margin-top:0}
    #board{border-collapse:collapse; margin:10px 0}
    #board td{width:66px; height:66px; text-align:center; vertical-align:middle; font-size:28px; cursor:pointer; border:1px solid #c79b6b; background: linear-gradient(#ffd, #f7e8d2)}
    #board .river{background: linear-gradient(#eef,#dfe9f3)}
    .cell.selected{outline:3px solid rgba(0,128,0,0.6)}
    .cell.move{outline:3px solid rgba(0,0,128,0.5)}
    .cell.capture{outline:3px solid rgba(200,0,0,0.7)}
    #controls{margin-top:12px}
    button{padding:8px 12px; margin-right:8px}
    .small{font-size:14px;color:#444}
    #status{margin-top:8px}
  </style>
</head>
<body>
  <h1>象棋 (Xiangqi) — PHP + HTML + JavaScript</h1>
  <div class="small">使用 PHP 提供初始棋盤；遊戲邏輯與互動由 JavaScript 處理。點選棋子 → 點選目標移動 / 吃子。支援基本棋子移動規則（車、馬、象、士、帥/將、炮、兵/卒）。尚未支援自動判和、悔棋多步紀錄。</div>

  <table id="board" aria-label="象棋棋盤"></table>
  <div id="controls">
    <button id="newGame">重新開始</button>
    <button id="flip">翻轉棋盤</button>
    <button id="save">儲存至 Session</button>
    <button id="load">從 Session 載入</button>
  </div>
  <div id="status"></div>

<script>
// Embedded initial board from PHP
const initialBoard = <?php echo $initial_json; ?>;

// Map piece code to display character (Chinese characters)
const PIECE_MAP = {
  'r': '車','n': '馬','b': '象','a': '士','k': '將','c': '砲','p': '卒',
  'R': '車','N': '馬','B': '相','A': '仕','K': '帥','C': '炮','P': '兵'
};

// Determine color (red uppercase, black lowercase)
function pieceColor(code){
  if(!code || code === '.') return null;
  return code === code.toUpperCase() ? 'red' : 'black';
}

let board = [];
let currentTurn = 'red'; // red moves first
let selected = null;
let flipped = false;

function cloneBoard(b){ return b.map(r=>r.slice()); }

function newGame(){ board = cloneBoard(initialBoard); currentTurn='red'; selected=null; render(); updateStatus(); }

function render(){
  const tbl = document.getElementById('board');
  tbl.innerHTML = '';
  for(let r=0;r<10;r++){
    const tr = document.createElement('tr');
    for(let c=0;c<9;c++){
      const td = document.createElement('td');
      td.className = 'cell';
      td.dataset.r = r; td.dataset.c = c;
      if(r===4 || r===5) td.classList.add('river');
      const pr = flipped? 9-r : r;
      const pc = flipped? 8-c : c;
      const code = board[pr][pc];
      if(code && code !== '.'){
        const span = document.createElement('div');
        span.textContent = PIECE_MAP[code] || code;
        span.style.fontWeight = '700';
        span.title = code;
        td.appendChild(span);
      }
      td.addEventListener('click', onCellClick);
      tr.appendChild(td);
    }
    tbl.appendChild(tr);
  }
}

function onCellClick(e){
  const td = e.currentTarget;
  const r = parseInt(td.dataset.r); const c = parseInt(td.dataset.c);
  const pr = flipped? 9-r : r;
  const pc = flipped? 8-c : c;
  const code = board[pr][pc];
  if(selected){
    // try move selected -> pr,pc
    const [sr,sc] = selected;
    if(sr===pr && sc===pc){ selected=null; clearHighlights(); render(); return; }
    const moving = board[sr][sc];
    const target = board[pr][pc];
    if(moving && pieceColor(moving) === currentTurn){
      if(canMove(board, sr, sc, pr, pc)){
        // perform move
        board[pr][pc] = moving;
        board[sr][sc] = '.';
        selected = null;
        clearHighlights();
        // switch turn
        currentTurn = (currentTurn==='red')? 'black':'red';
        render(); updateStatus();
        checkGameEnd();
        return;
      } else {
        // invalid move: if clicked on own piece, change selection
        if(target && pieceColor(target) === currentTurn){ selected=[pr,pc]; clearHighlights(); highlightMoves(pr,pc); render(); } else {
          flashMessage('不合法的移動');
        }
      }
    } else {
      selected=null; clearHighlights(); render();
    }
  } else {
    if(code && pieceColor(code) === currentTurn){
      selected=[pr,pc]; clearHighlights(); highlightMoves(pr,pc); render();
    }
  }
}

function updateStatus(){
  document.getElementById('status').textContent = `輪到：${currentTurn==='red'?'紅方':'黑方'}`;
}

function flashMessage(msg){
  const s = document.getElementById('status');
  const old = s.textContent;
  s.textContent = msg;
  setTimeout(()=> s.textContent = old, 900);
}

function clearHighlights(){
  document.querySelectorAll('.cell').forEach(el=>{ el.classList.remove('selected','move','capture'); });
}

function highlightMoves(r,c){
  const code = board[r][c];
  if(!code || code==='.') return;
  // highlight source cell
  const [dr,dc] = realToDisplay(r,c);
  const idx = dr*9+dc;
  const cells = document.querySelectorAll('#board .cell');
  cells[idx].classList.add('selected');
  // compute legal moves
  for(let rr=0;rr<10;rr++)for(let cc=0;cc<9;cc++){
    if(canMove(board, r,c, rr,cc)){
      const [drr,dcc] = realToDisplay(rr,cc);
      const td = cells[drr*9 + dcc];
      if(board[rr][cc] && board[rr][cc] !== '.') td.classList.add('capture'); else td.classList.add('move');
    }
  }
}

function realToDisplay(r,c){ // convert actual indexes to displayed indexes depending on flipped
  if(!flipped) return [r,c];
  return [9-r, 8-c];
}

// Basic move legality for Xiangqi pieces. This is a simplified but reasonably accurate implementation.
function canMove(b, sr, sc, tr, tc){
  if(sr===tr && sc===tc) return false;
  const p = b[sr][sc];
  if(!p || p==='.') return false;
  const color = pieceColor(p);
  const target = b[tr][tc];
  if(target && pieceColor(target) === color) return false; // cannot capture own
  const dr = tr - sr; const dc = tc - sc;
  const adr = Math.abs(dr); const adc = Math.abs(dc);
  const up = (color==='red'); // red moves "up" towards smaller row index (since red at bottom rows 9)

  const lower = (ch) => ch === ch.toLowerCase();

  const kind = p.toUpperCase();
  switch(kind){
    case 'R': // rook: straight, no block
      if(!(dr===0 || dc===0)) return false;
      if(isBlockedStraight(b, sr, sc, tr, tc)) return false;
      return true;
    case 'N': // knight: L, with leg check
      if(!( (adr===2 && adc===1) || (adr===1 && adc===2) )) return false;
      // leg position
      if(adr===2){ const legr = sr + (dr/2); if(b[legr][sc] !== '.') return false; }
      else { const legc = sc + (dc/2); if(b[sr][legc] !== '.') return false; }
      return true;
    case 'B': // Elephant/Minister: move 2 diagonal and cannot cross river (each side limited)
      if(!(adr===2 && adc===2)) return false;
      // eye
      const midr = sr + dr/2; const midc = sc + dc/2;
      if(b[midr][midc] !== '.') return false;
      // cannot cross river
      if(color==='red' && tr < 5) return false; // red side is rows 5-9, can't go to rows 0-4
      if(color==='black' && tr > 4) return false; // black side rows 0-4
      return true;
    case 'A': // Advisor: move 1 diagonal inside palace
      if(!(adr===1 && adc===1)) return false;
      if(!inPalace(tr,tc,color)) return false;
      return true;
    case 'K': // General: one step orthogonal inside palace, plus face-to-face rule
      if(!((adr===1 && adc===0) || (adr===0 && adc===1))) return false;
      if(!inPalace(tr,tc,color)) return false;
      // face-to-face: cannot expose generals
      // We'll also disallow a move that leaves generals facing with no pieces between on same file
      const backupFrom = b[sr][sc]; const backupTo = b[tr][tc];
      b[tr][tc]=backupFrom; b[sr][sc]='.';
      const generalsFace = generalsFacing(b);
      b[sr][sc]=backupFrom; b[tr][tc]=backupTo;
      if(generalsFace) return false;
      return true;
    case 'C': // Cannon: like rook when not capturing. When capturing there must be exactly one piece between
      if(!(dr===0 || dc===0)) return false;
      const blocks = countBetween(b, sr, sc, tr, tc);
      if(target === '.' || !target){ // non-capture: no blocks
        return blocks===0;
      } else { // capture: must have exactly one between
        return blocks===1;
      }
    case 'P': // Pawn: forward one, after cross river can move sideways
      if(color==='red'){
        // red moves up (decreasing row index)
        if(sr <= 4){ // crossed river? red's starting rows 6-9; crossing to rows 0-4
          // can move forward or sideways
          if( (adr===1 && dc===0 && dr===-1) || (adr===0 && adc===1 && dr===0) ) return true;
        } else {
          // before crossing, only forward
          if(adr===1 && dc===0 && dr===-1) return true;
        }
      } else {
        // black moves down (increasing row)
        if(sr >=5){ // black crossed river when row >=5
          if( (adr===1 && dc===0 && dr===1) || (adr===0 && adc===1 && dr===0) ) return true;
        } else {
          if(adr===1 && dc===0 && dr===1) return true;
        }
      }
      return false;
  }
  return false;
}

function inPalace(r,c,color){
  if(c<3 || c>5) return false;
  if(color==='red') return r>=7 && r<=9;
  return r>=0 && r<=2;
}

function isBlockedStraight(b, sr, sc, tr, tc){
  if(sr===tr){
    const step = (tc>sc)?1:-1;
    for(let c=sc+step;c!==tc;c+=step) if(b[sr][c] !== '.') return true;
    return false;
  }
  if(sc===tc){
    const step = (tr>sr)?1:-1;
    for(let r=sr+step;r!==tr;r+=step) if(b[r][sc] !== '.') return true;
    return false;
  }
  return true;
}

function countBetween(b,sr,sc,tr,tc){
  let cnt=0;
  if(sr===tr){ const step=(tc>sc)?1:-1; for(let c=sc+step;c!==tc;c+=step) if(b[sr][c] !== '.') cnt++; }
  else if(sc===tc){ const step=(tr>sr)?1:-1; for(let r=sr+step;r!==tr;r+=step) if(b[r][sc] !== '.') cnt++; }
  return cnt;
}

function generalsFacing(b){
  // check if two generals on same file with no pieces between
  let pos = [];
  for(let r=0;r<10;r++){
    for(let c=0;c<9;c++){
      if(b[r][c] && (b[r][c].toUpperCase()==='K')) pos.push([r,c,b[r][c]]);
    }
  }
  if(pos.length!==2) return false;
  const [r1,c1] = pos[0]; const [r2,c2] = pos[1];
  if(c1 !== c2) return false;
  // count pieces between
  const cnt = countBetween(b, r1,c1,r2,c2);
  return cnt===0;
}

function checkGameEnd(){
  // simple check: if a general is captured, announce winner
  let redK=false, blackK=false;
  for(let r=0;r<10;r++)for(let c=0;c<9;c++){ const p=board[r][c]; if(p==='K') redK=true; if(p==='k') blackK=true; }
  if(!redK || !blackK){
    setTimeout(()=>{
      alert((!redK? '黑方':'紅方') + ' 贏了！');
      newGame();
    },50);
  }
}

// Controls
document.getElementById('newGame').addEventListener('click', ()=>{ newGame(); });
document.getElementById('flip').addEventListener('click', ()=>{ flipped=!flipped; render(); });
document.getElementById('save').addEventListener('click', ()=>{ fetch(location.pathname + '?action=save', {method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify({board:board, turn:currentTurn})}).then(r=>r.text()).then(t=>alert(t)); });
document.getElementById('load').addEventListener('click', ()=>{ fetch(location.pathname + '?action=load').then(r=>r.json()).then(obj=>{ if(obj.board){ board=obj.board; currentTurn=obj.turn||'red'; selected=null; render(); updateStatus(); } else alert('session 中沒有儲存'); }); });

// Page load: initialize board. Also check if session has saved board via PHP GET param
(function(){
  // try to load from PHP session via simple endpoint on same file
  newGame();
})();

// Server endpoints: use fetch to POST/GET to same file. Provide handling in PHP below.

</script>

<?php
// Simple server-side handling for save/load using session
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action']==='save'){
    // read body
    $data = json_decode(file_get_contents('php://input'), true);
    if($data && isset($data['board'])){
        $_SESSION['xiangqi_saved'] = $data;
        echo '已儲存至 session';
    } else echo '儲存失敗';
    exit;
}
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action']==='load'){
    header('Content-Type: application/json');
    if(isset($_SESSION['xiangqi_saved'])){
        echo json_encode($_SESSION['xiangqi_saved']);
    } else echo json_encode(['error'=>'no save']);
    exit;
}
?>

</body>
</html>
