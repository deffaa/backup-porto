// --- 1. Filter Proyek ---
const fltBtn = document.querySelector("#flt");
if (fltBtn) {
    fltBtn.onclick = function(e) {
        if (e.target.tagName !== "BUTTON") return;
        let v = e.target.textContent;
        document.querySelectorAll("#flt button").forEach(b => b.classList.toggle("on", b === e.target));
        document.querySelectorAll(".card").forEach(c => { c.classList.toggle("hide", v !== "Semua" && c.dataset.c !== v); });
    };
}

// --- 2. Efek 3D Proyek ---
document.querySelectorAll(".card").forEach(c => {
    c.addEventListener("mousemove", e => {
        let r = c.getBoundingClientRect(), x = (e.clientX - r.left) / r.width - .5, y = (e.clientY - r.top) / r.height - .5;
        c.style.transform = `perspective(700px) rotateY(${x * 8}deg) rotateX(${-y * 8}deg)`;
    });
    c.addEventListener("mouseleave", () => c.style.transform = "perspective(700px) rotateY(0deg) rotateX(0deg)");
});

// --- 3. Efek Mengetik Otomatis ---
const R = window.portfolioData ? window.portfolioData.roles : []; 
let ri = 0, ci = 0, del = false;
(function tp() {
    if (!R.length) return;
    let w = R[ri]; ci += del ? -1 : 1;
    let roleEl = document.querySelector("#role");
    if (roleEl) roleEl.textContent = w.slice(0, ci);
    let t = del ? 35 : 75;
    if (!del && ci === w.length) { del = true; t = 1500; } else if (del && ci === 0) { del = false; ri = (ri + 1) % R.length; t = 350; }
    setTimeout(tp, t);
})();

// --- 4. Terminal Interaktif ---
const termEl = document.querySelector(".term");
if (termEl) {
    termEl.style.transition = "transform 0.15s ease-out"; 
    termEl.style.willChange = "transform";
    termEl.addEventListener("mousemove", e => {
        let r = termEl.getBoundingClientRect();
        let x = (e.clientX - r.left) / r.width - 0.5; 
        let y = (e.clientY - r.top) / r.height - 0.5;
        termEl.style.transform = `perspective(1000px) rotateY(${x * 6}deg) rotateX(${-y * 6}deg)`;
    });
    termEl.addEventListener("mouseleave", () => termEl.style.transform = "perspective(1000px) rotateY(0deg) rotateX(0deg)");
}

const out = document.querySelector("#out"), inp = document.querySelector("#cmd"), chips = document.querySelector("#chips");
let hist = [], hp = 0;
const pData = window.portfolioData || { skills: [], projects: [], socials: [] };
const C = {
    help: "Perintah: about, skills, projects, social, clear",
    about: "Deffa Haidar Darmansyah – mahasiswa Teknik Informatika semester 5.\nFokus pada web development dan AI.",
    skills: pData.skills.map(s => s.name.padEnd(14) + "█".repeat(Math.round(s.percentage/10)) + " " + s.percentage + "%").join("\n"),
    projects: pData.projects.map((p, i) => (i+1) + ". " + p.title + " [" + p.category + "]").join("\n"),
    social: pData.socials.map(s => s.platform_name.padEnd(10) + `<a href="${s.url}" target="_blank" rel="noopener">${s.handle}</a>`).join("\n")
};

function print(h, cls = "") {
    if(!out) return; let p = document.createElement("p");
    if (cls) p.className = cls; p.innerHTML = h; out.appendChild(p); out.scrollTop = out.scrollHeight;
}

function run(c) {
    c = c.trim().toLowerCase(); if (!c) return;
    print("$ " + c, "c"); hist.push(c); hp = hist.length;
    if (c === "clear") { out.innerHTML = ""; return; }
    let known = Object.prototype.hasOwnProperty.call(C, c);
    print(known ? C[c] : `Perintah tidak dikenal. Ketik help.`, known ? "" : "m");
}

if(out && inp) {
    print("Sistem siap. Klik opsi atau ketik perintah.", "a"); run("help");
    chips.innerHTML = ["about","skills","projects","social","clear"].map(c => `<button>${c}</button>`).join("");
    chips.onclick = e => { if (e.target.tagName === "BUTTON") run(e.target.textContent); };
    inp.onkeydown = e => {
        if (e.key === "Enter") { run(inp.value); inp.value = ""; }
        else if (e.key === "ArrowUp" && hp > 0) { inp.value = hist[--hp]; }
        else if (e.key === "ArrowDown") { hp = Math.min(hp + 1, hist.length); inp.value = hist[hp] || ""; }
    };
}

// --- 5. Upload Foto & Upload CV ---
const pic = document.querySelector("#pic"), ava = document.querySelector("#ava"), lb = document.querySelector("#lb");
const fileInput = document.querySelector("#file"), photoForm = document.querySelector("#photo-form"), upBtn = document.querySelector("#upb");
const cvInput = document.querySelector("#cv-file"), cvForm = document.querySelector("#cv-form"), upCvBtn = document.querySelector("#upcv-btn");

if (upBtn && fileInput && photoForm) {
    upBtn.addEventListener("click", () => fileInput.click());
    fileInput.addEventListener("change", () => { if (fileInput.files.length > 0) photoForm.submit(); });
}
if (upCvBtn && cvInput && cvForm) {
    upCvBtn.addEventListener("click", () => cvInput.click());
    cvInput.addEventListener("change", () => { if (cvInput.files.length > 0) cvForm.submit(); });
}
if (ava) { ava.onclick = () => { if (pic && pic.style.display === "block") lb.classList.add("on"); }; }
if (lb) lb.onclick = function() { this.classList.remove("on"); };
addEventListener("keydown", e => { if (e.key === "Escape" && lb) lb.classList.remove("on"); });

// --- 6. Animasi 3D Kartu Statistik ---
document.querySelectorAll(".stat").forEach(card => {
    card.style.transition = "transform 0.15s ease-out";
    card.style.willChange = "transform";
    card.addEventListener("mousemove", e => {
        let r = card.getBoundingClientRect(), x = (e.clientX - r.left) / r.width - 0.5, y = (e.clientY - r.top) / r.height - 0.5;
        card.style.transform = `perspective(800px) rotateY(${x * 10}deg) rotateX(${-y * 10}deg) scale(1.02)`;
    });
    card.addEventListener("mouseleave", () => card.style.transform = "perspective(800px) rotateY(0deg) rotateX(0deg) scale(1)");
});

// --- Karakter Piksel Interaktif (Berganti Pose & Dialog saat Diklik) ---
const charBox = document.querySelector("#interactive-char");
const speech = document.querySelector("#speech-bubble");
const pixelChar = document.querySelector("#pixelChar");

const poses = [
    { x: 0,    y: 0 },    // Pose 1 (Baris atas, Kolom 1 - Berlari)
    { x: -120, y: 0 },    // Pose 2 (Baris atas, Kolom 2)
    { x: -240, y: 0 },    // Pose 3 (Baris atas, Kolom 3)
    { x: -360, y: 0 },    // Pose 4 (Baris atas, Kolom 4)
    { x: 0,    y: -140 }, // Pose 5 (Baris bawah, Kolom 1 - Berdiri)
    { x: -120, y: -140 }, // Pose 6 (Baris bawah, Kolom 2)
    { x: -240, y: -140 }, // Pose 7 (Baris bawah, Kolom 3)
    { x: -360, y: -140 }  // Pose 8 (Baris bawah, Kolom 4)
];

const quotes = [
    "Mantap! Pose saya berubah setiap kamu klik!",
    "Awas, Deffa Piksel sedang berpatroli.",
    "Lagi cari web developer? Kamu berada di tempat yang tepat.",
    "Coba klik saya terus buat lihat pose aksi lainnya!",
    "Tekan tombol email di bawah untuk terhubung langsung.",
    "Portofolio Laravel ini dibuat dengan gaya monokrom minimalis.",
    "Ssstt... Coba ketik 'help' di terminal atas untuk perintah rahasia."
];

let poseIndex = 4; // Mulai dari pose berdiri

if (charBox && speech && pixelChar) {
    charBox.addEventListener("click", () => {
        // 1. Ganti dialog secara acak
        let newText;
        do {
            newText = quotes[Math.floor(Math.random() * quotes.length)];
        } while (newText === speech.textContent && quotes.length > 1);
        speech.textContent = newText;
        charBox.classList.add("active");

        // 2. Ubah pose gambar sprite ke kotak berikutnya secara berurutan/acak
        poseIndex = (poseIndex + 1) % poses.length;
        let currentPose = poses[poseIndex];
        pixelChar.style.backgroundPosition = `${currentPose.x}px ${currentPose.y}px`;

        // 3. Efek animasi lompat kecil (bounce)
        charBox.style.transform = "translateY(-15px) scale(1.1)";
        setTimeout(() => { charBox.style.transform = ""; }, 150);

        // Hilangkan balon kata setelah 4 detik
        clearTimeout(charBox.timeout);
        charBox.timeout = setTimeout(() => {
            charBox.classList.remove("active");
        }, 4000);
    });
}
if (charBox && speech) {
    charBox.addEventListener("click", () => {
        let currentText = speech.textContent;
        let newText;
        do {
            newText = quotes[Math.floor(Math.random() * quotes.length)];
        } while (newText === currentText && quotes.length > 1);

        speech.textContent = newText;
        charBox.classList.add("active");
        
        charBox.style.transform = "translateY(-20px) scale(1.1)";
        setTimeout(() => { charBox.style.transform = ""; }, 200);

        clearTimeout(charBox.timeout);
        charBox.timeout = setTimeout(() => {
            charBox.classList.remove("active");
        }, 4000);
    });
}

// --- 8. UI Utility (Scroll, Observer, Toast) ---
const g = document.querySelector("#glow");
addEventListener("mousemove", e => { if(g) g.style.transform = `translate(${e.clientX - 260}px, ${e.clientY - 260}px)`; });
addEventListener("scroll", () => {
    let d = document.documentElement, bar = document.querySelector("#bar");
    if(bar) bar.style.width = (scrollY / (d.scrollHeight - innerHeight) * 100) + "%";
}, { passive: true });

const spy = new IntersectionObserver(es => {
    es.forEach(e => {
        if (e.isIntersecting) document.querySelectorAll("#menu a").forEach(a => a.classList.toggle("on", a.getAttribute("href") === "#" + e.target.id));
    });
}, { rootMargin: "-45% 0px -50% 0px" });
document.querySelectorAll("section").forEach(s => spy.observe(s));

const rv = new IntersectionObserver((es, o) => {
    es.forEach(e => {
        if (!e.isIntersecting) return;
        let t = e.target; t.classList.add("in"); o.unobserve(t);
        t.querySelectorAll(".trk i").forEach(b => b.style.width = b.dataset.w + "%");
        t.querySelectorAll("[data-n]").forEach(n => {
            let to = +n.dataset.n, d = +n.dataset.d || 0, s = null;
            requestAnimationFrame(function f(ts) {
                s = s || ts; let p = Math.min((ts - s) / 1200, 1); n.textContent = (to * p).toFixed(d);
                if (p < 1) requestAnimationFrame(f);
            });
        });
    });
}, { threshold: .15 });
document.querySelectorAll(".rv").forEach(el => rv.observe(el));

function toast(m, type = 'success') {
    let t = document.querySelector("#toast"); if(!t) return;
    t.textContent = m; t.style.background = type === 'error' ? 'var(--bg)' : 'var(--text)';
    t.style.color = type === 'error' ? '#ff5f56' : 'var(--bg)';
    t.classList.add("on"); setTimeout(() => t.classList.remove("on"), 3000);
}

if (window.flashMessage) toast(window.flashMessage, 'success');
if (window.errorMessage) toast(window.errorMessage, 'error');