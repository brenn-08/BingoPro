<script>
let isPlaying=false;
let calledNumbers=[];
let winStates=new Set();

function addCard(){
const container=document.getElementById('cardsContainer');
const cardId='id-'+Date.now();

const card=document.createElement('div');
card.className='bingo-card bg-white border-4 border-gray-800 rounded-xl p-4 relative shadow';
card.dataset.id=cardId;

card.innerHTML=`
<div class="badge terna-badge">TERNA!</div>
<div class="badge bingo-badge">BINGO!</div>
<div class="badge royal-badge">ROYAL!</div>
<div class="badge blackout-badge">BLACKOUT!</div>
<button class="absolute -top-3 -right-3 bg-red-500 text-white rounded-full w-6 h-6" onclick="this.parentElement.remove()">×</button>
<div class="grid"></div>`;

const grid=card.querySelector('.grid');

for(let i=0;i<25;i++){
let val=i===12?"FREE":Math.floor(Math.random()*75)+1;
grid.innerHTML+=`
<div class="cell ${val==='FREE'?'marked':''}">
<input type="text" value="${val}" onchange="updateGame()">
</div>`;
}

container.appendChild(card);
updateGame();
}

function togglePlayMode(){
isPlaying=!isPlaying;
document.getElementById('playArea').classList.toggle('hidden');
document.getElementById('playToggle').innerText=isPlaying?"Setup Mode":"Start Game";
document.querySelectorAll('.cell input').forEach(i=>i.readOnly=isPlaying);
}

function callNumber(){
const input=document.getElementById('callInput');
const num=input.value.trim();
if(num!==""&&!calledNumbers.includes(num)){
calledNumbers.push(num);
updateGame();
}
input.value="";
input.focus();
}

function updateGame(){
const gameMode=document.getElementById('gameType').value;

document.querySelectorAll('.bingo-card').forEach(card=>{
const cardId=card.dataset.id;
const cells=card.querySelectorAll('.cell');

cells.forEach(cell=>{
const val=cell.querySelector('input').value;
if(val==="FREE"||calledNumbers.includes(val)){
cell.classList.add('marked');
}else{
cell.classList.remove('marked');
}
});

const marks=Array.from(cells).map(c=>c.classList.contains('marked'));

card.classList.remove('is-terna','is-bingo','is-royal','is-blackout');

if(gameMode==="1"){
if(checkBingo(marks)){
card.classList.add('is-bingo');
fireConfetti(card,cardId+"bingo");
}else{
if(checkTerna(marks)) card.classList.add('is-terna');
}
}else{
if(marks.every(m=>m)){
card.classList.add('is-blackout');
fireConfetti(card,cardId+"blackout");
}else{
if(checkRoyalStrict(marks)) card.classList.add('is-royal');
}
}
});

document.getElementById('historyList').innerHTML=
[...calledNumbers].reverse().map(n=>`
<div class="bg-white border p-2 flex justify-between">
<b>#${n}</b>
<button class="text-red-500" onclick="removeCall('${n}')">✖</button>
</div>`).join('');
}

function fireConfetti(cardElement,winKey){
if(!winStates.has(winKey)){
winStates.add(winKey);
const rect=cardElement.getBoundingClientRect();
confetti({
particleCount:120,
spread:60,
origin:{
x:(rect.left+rect.width/2)/window.innerWidth,
y:(rect.top+rect.height/2)/window.innerHeight
}
});
}
}

function checkTerna(m){
for(let r=0;r<5;r++){
for(let c=0;c<=2;c++){
let idx=[r*5+c,r*5+c+1,r*5+c+2];
if(idx.every(i=>m[i]&&i!==12)) return true;
}
}
return false;
}

function checkBingo(m){
for(let i=0;i<5;i++){
if([0,1,2,3,4].every(j=>m[i*5+j])) return true;
if([0,5,10,15,20].every(j=>m[i+j])) return true;
}
return false;
}

function checkRoyalStrict(m){
const top=[0,1,2,3,4,5,6,7,8,9].every(i=>m[i]);
const bottom=[15,16,17,18,19,20,21,22,23,24].every(i=>m[i]);
return top||bottom;
}

function removeCall(n){
calledNumbers=calledNumbers.filter(x=>x!==n);
updateGame();
}

function resetGame(){
if(confirm("Clear all calls?")){
calledNumbers=[];
winStates.clear();
updateGame();
}
}

document.addEventListener('DOMContentLoaded',()=>{
document.getElementById('callInput').addEventListener('keypress',e=>{
if(e.key==='Enter') callNumber();
});
addCard();
});
</script>