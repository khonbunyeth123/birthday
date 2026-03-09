<?php
$name = "Bunyeth";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday <?php echo $name; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #0a0a1a;
            overflow-y: auto;
            overflow-x: hidden;
            min-height: 100vh;
            padding: 20px;
            scroll-behavior: smooth;
        }

        .stars {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            pointer-events: none;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            opacity: 0.6;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }

        .fireworks-container {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 50;
            pointer-events: none;
        }

        .explosion-particle {
            position: absolute;
            pointer-events: none;
            will-change: transform, opacity;
        }

        .big-burst {
            position: absolute;
            font-size: 8rem;
            will-change: transform, opacity;
            filter: drop-shadow(0 0 30px rgba(255, 107, 157, 1));
        }

        @keyframes bigBurst {
            0% { opacity: 1; transform: translate(-50%, -50%) scale(0) rotate(0deg); }
            10% { opacity: 1; transform: translate(-50%, -50%) scale(1.2) rotate(0deg); }
            100% { opacity: 0; transform: translate(-50%, -50%) scale(1) rotate(360deg); }
        }

        @keyframes particleFly {
            0% { opacity: 1; transform: translate(0, 0) scale(1) rotate(0deg); }
            50% { opacity: 1; transform: translate(calc(var(--px) * 0.7), calc(var(--py) * 0.7)) scale(1.1) rotate(180deg); }
            100% { opacity: 0; transform: translate(var(--px), var(--py)) scale(0.2) rotate(360deg); }
        }

        @keyframes particleGlow {
            0% { filter: drop-shadow(0 0 15px rgba(255, 107, 157, 1)) drop-shadow(0 0 25px rgba(255, 200, 100, 0.8)); }
            50% { filter: drop-shadow(0 0 25px rgba(255, 107, 157, 1)) drop-shadow(0 0 40px rgba(255, 200, 100, 1)); }
            100% { filter: drop-shadow(0 0 0px rgba(255, 107, 157, 0)) drop-shadow(0 0 0px rgba(255, 200, 100, 0)); }
        }

        @keyframes shockwave {
            0% { width: 10px; height: 10px; opacity: 1; transform: translate(-50%, -50%) scale(0); }
            100% { width: 10px; height: 10px; opacity: 0; transform: translate(-50%, -50%) scale(20); }
        }

        .shockwave {
            position: absolute;
            border: 3px solid rgba(255, 107, 157, 0.8);
            border-radius: 50%;
            animation: shockwave 0.8s ease-out;
        }

        .container {
            position: relative;
            z-index: 10;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0;
        }

        .container.show {
            animation: fadeInContent 0.8s ease-out forwards;
        }

        @keyframes fadeInContent {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .reveal-overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(10, 10, 26, 0.95);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 40;
            cursor: pointer;
        }

        .reveal-overlay.hidden {
            pointer-events: none;
            animation: fadeOut 0.6s ease-out forwards;
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        .click-prompt-text {
            font-size: 2.5rem;
            margin-bottom: 20px;
            animation: bounce 1.5s ease-in-out infinite;
            color: white;
            text-align: center;
        }

        .click-prompt-icon {
            font-size: 4rem;
            animation: pulse-scale 1.5s ease-in-out infinite;
            text-align: center;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse-scale {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .cake-section {
            display: flex;
            justify-content: center;
            margin-bottom: 60px;
            animation: cakeAppear 0.8s ease-out;
        }

        @keyframes cakeAppear {
            from { opacity: 0; transform: translateY(-50px) scale(0.8); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .cake {
            font-size: 140px;
            filter: drop-shadow(0 0 30px rgba(255, 150, 100, 0.8));
            animation: cakeFloat 2.5s ease-in-out infinite;
        }

        @keyframes cakeFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .messages-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 40px;
        }

        .message-box {
            background: white;
            border-radius: 25px;
            padding: 25px 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            animation: messageSlideIn 0.8s ease-out both;
        }

        .message-box:nth-child(1) { animation-delay: 0.3s; }
        .message-box:nth-child(2) { animation-delay: 0.5s; }
        .message-box:nth-child(3) { animation-delay: 0.7s; }

        @keyframes messageSlideIn {
            from { opacity: 0; transform: translateX(-50px) scale(0.9); }
            to { opacity: 1; transform: translateX(0) scale(1); }
        }

        .message-text {
            font-size: 1.3rem;
            color: #333;
            font-weight: 400;
            line-height: 1.8;
            text-align: center;
        }

        .heart-emoji {
            animation: heartBeat 1s ease-in-out infinite;
            display: inline-block;
        }

        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15); }
        }

        .gallery-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 40px;
            animation: galleryFadeIn 1s ease-out 0.9s both;
        }

        @keyframes galleryFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .photo-frame {
            aspect-ratio: 1;
            background: #f0f0f0;
            border: 5px solid #ff6b9d;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            box-shadow: 0 10px 30px rgba(255, 107, 157, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            animation: photoScaleIn 0.6s ease-out both;
        }

        .photo-frame:nth-child(1) { animation-delay: 1s; }
        .photo-frame:nth-child(2) { animation-delay: 1.1s; }

        @keyframes photoScaleIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        .photo-frame:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(255, 107, 157, 0.6);
        }

        .final-message {
            text-align: center;
            margin-top: 40px;
            animation: fadeInUp 0.8s ease-out 1.2s both;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .final-text {
            font-size: 1.8rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .name-highlight {
            color: #ff6b9d;
            font-weight: 700;
            font-size: 2.2rem;
        }

        .floating-emoji {
            position: fixed;
            font-size: 2.5rem;
            pointer-events: none;
            animation: floatAway 2s ease-out forwards;
            z-index: 5;
        }

        @keyframes floatAway {
            0% { opacity: 1; transform: translateY(0) translateX(0) scale(1) rotate(0deg); }
            100% { opacity: 0; transform: translateY(-200px) translateX(var(--tx)) scale(0) rotate(360deg); }
        }

        .fireworks-heart {
            position: fixed;
            font-size: 3rem;
            pointer-events: none;
            will-change: transform, opacity;
            z-index: 6;
        }

        @keyframes heartExplode {
            0% { opacity: 1; transform: translate(-50%, -50%) scale(1) rotate(0deg); }
            100% { opacity: 0; transform: translate(calc(-50% + var(--tx)), calc(-50% + var(--ty))) scale(0) rotate(360deg); }
        }

        .heart-particle {
            position: fixed;
            pointer-events: none;
            will-change: transform, opacity;
        }

        .music-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #ff6b9d 0%, #ffd93d 100%);
            color: white;
            border: none;
            padding: 14px 24px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(255, 107, 157, 0.4);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .music-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(255, 107, 157, 0.6);
        }

        .music-btn.playing {
            animation: musicPulse 0.6s ease-in-out infinite;
        }

        @keyframes musicPulse {
            0%, 100% { box-shadow: 0 8px 25px rgba(255, 107, 157, 0.4); }
            50% { box-shadow: 0 8px 40px rgba(255, 107, 157, 0.8); }
        }

        @media (max-width: 600px) {
            .cake { font-size: 100px; }
            .message-text { font-size: 1.2rem; }
            .photo-frame { font-size: 3.5rem; }
            .final-text { font-size: 1.5rem; }
            .name-highlight { font-size: 1.8rem; }
            .music-btn { bottom: 20px; right: 20px; padding: 10px 18px; font-size: 0.9rem; }
            .big-burst { font-size: 5rem; }
        }
    </style>
</head>
<body>
    <div class="stars" id="starsContainer"></div>
    <div class="fireworks-container" id="fireworksContainer"></div>
    <div class="reveal-overlay" id="revealOverlay">
        <div>
            <div class="click-prompt-text">🎉 Click to Reveal! 🎉</div>
            <div class="click-prompt-icon">💖</div>
        </div>
    </div>

    <div class="container">
        <div class="cake-section">
            <div class="cake">🎂</div>
        </div>

        <div class="messages-section">
            <div class="message-box">
                <p class="message-text">
                    <span class="heart-emoji">💕</span>
                    Wishing you the happiest of days filled with love and laughter!
                    <span class="heart-emoji">💕</span>
                </p>
            </div>
            <div class="message-box">
                <p class="message-text">
                    <span class="heart-emoji">🎉</span>
                    Thank you for being such an amazing person!
                    <span class="heart-emoji">🎉</span>
                </p>
            </div>
            <div class="message-box">
                <p class="message-text">
                    <span class="heart-emoji">✨</span>
                    Have the most beautiful day ever!
                    <span class="heart-emoji">✨</span>
                </p>
            </div>
        </div>

        <div class="gallery-section">
            <div class="photo-frame" id="frame1">📷</div>
            <div class="photo-frame" id="frame2">🖼️</div>
        </div>

        <div class="final-message">
            <p class="final-text">
                Happy Birthday<br>
                <span class="name-highlight"><?php echo strtoupper($name); ?>!</span><br>
                <span style="font-size: 1.6rem;">🎉💖✨</span>
            </p>
        </div>
    </div>

    <button class="music-btn" id="musicBtn">🎵 Play</button>
    <audio id="bg-music" loop>
        <source src="https://www.bensound.com/bensound-music/bensound-happyrock.mp3" type="audio/mpeg">
    </audio>

    <script>
        function createStars() {
            const starsContainer = document.getElementById('starsContainer');
            for (let i = 0; i < 80; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                star.style.left = Math.random() * 100 + '%';
                star.style.top = Math.random() * 100 + '%';
                star.style.animationDuration = (Math.random() * 2 + 2) + 's';
                star.style.animationDelay = Math.random() * 3 + 's';
                starsContainer.appendChild(star);
            }
        }

        function createOpeningFireworks() {
            const container = document.getElementById('fireworksContainer');
            const centerX = window.innerWidth / 2;
            const centerY = window.innerHeight / 2;

            const burstHearts = ['💖', '💕', '💗', '💓', '💞'];
            for (let i = 0; i < 5; i++) {
                setTimeout(() => {
                    const burst = document.createElement('div');
                    burst.className = 'big-burst';
                    burst.textContent = burstHearts[i];
                    burst.style.left = centerX + 'px';
                    burst.style.top = centerY + 'px';
                    burst.style.animation = `bigBurst 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards`;
                    container.appendChild(burst);
                    setTimeout(() => burst.remove(), 1200);
                }, i * 150);
            }

            for (let i = 0; i < 3; i++) {
                setTimeout(() => {
                    const shock = document.createElement('div');
                    shock.className = 'shockwave';
                    shock.style.left = centerX + 'px';
                    shock.style.top = centerY + 'px';
                    container.appendChild(shock);
                    setTimeout(() => shock.remove(), 800);
                }, i * 200);
            }

            const particleCount = 40;
            const hearts = ['💕', '💖', '✨', '💗', '💓', '💞', '💝', '💘', '🎉', '🌟', '✨', '💫'];
            
            for (let i = 0; i < particleCount; i++) {
                setTimeout(() => {
                    const angle = (Math.PI * 2 * i) / particleCount;
                    const distance = 200 + Math.random() * 150;
                    const px = Math.cos(angle) * distance;
                    const py = Math.sin(angle) * distance;

                    const particle = document.createElement('div');
                    particle.className = 'explosion-particle';
                    particle.textContent = hearts[Math.floor(Math.random() * hearts.length)];
                    particle.style.left = centerX + 'px';
                    particle.style.top = centerY + 'px';
                    particle.style.fontSize = (Math.random() * 2.5 + 1.5) + 'rem';
                    particle.style.setProperty('--px', px + 'px');
                    particle.style.setProperty('--py', py + 'px');
                    particle.style.animation = `particleFly ${Math.random() * 0.8 + 1.2}s ease-out forwards, particleGlow ${Math.random() * 0.8 + 1.2}s ease-out forwards`;
                    particle.style.animationDelay = (i * 0.03) + 's';
                    container.appendChild(particle);
                    setTimeout(() => particle.remove(), 2000);
                }, 100 + i * 30);
            }

            setTimeout(() => {
                for (let i = 0; i < 20; i++) {
                    const angle = (Math.PI * 2 * i) / 20;
                    const distance = 250;
                    const px = Math.cos(angle) * distance;
                    const py = Math.sin(angle) * distance;

                    const particle = document.createElement('div');
                    particle.className = 'explosion-particle';
                    particle.textContent = '✨';
                    particle.style.left = centerX + 'px';
                    particle.style.top = centerY + 'px';
                    particle.style.fontSize = '2rem';
                    particle.style.setProperty('--px', px + 'px');
                    particle.style.setProperty('--py', py + 'px');
                    particle.style.animation = `particleFly 1s ease-out forwards`;
                    container.appendChild(particle);
                    setTimeout(() => particle.remove(), 1000);
                }
            }, 600);
        }

        function createFloatingEmojis() {
            const emojis = ['💕', '💖', '✨', '🎉', '🌟', '🎈'];
            for (let i = 0; i < 6; i++) {
                setTimeout(() => {
                    const emoji = document.createElement('div');
                    emoji.className = 'floating-emoji';
                    emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
                    emoji.style.left = (Math.random() * 80 + 10) + '%';
                    emoji.style.top = window.innerHeight - 100 + 'px';
                    emoji.style.setProperty('--tx', (Math.random() - 0.5) * 200 + 'px');
                    emoji.style.animationDuration = (Math.random() * 0.5 + 1.5) + 's';
                    document.body.appendChild(emoji);
                    setTimeout(() => emoji.remove(), 2500);
                }, i * 150);
            }
        }

        function createHeartFireworks(x, y) {
            const mainHeart = document.createElement('div');
            mainHeart.className = 'fireworks-heart';
            mainHeart.textContent = '💖';
            mainHeart.style.left = x + 'px';
            mainHeart.style.top = y + 'px';
            mainHeart.style.setProperty('--tx', '0px');
            mainHeart.style.setProperty('--ty', '0px');
            mainHeart.style.animation = `heartExplode 0.6s ease-out forwards`;
            mainHeart.style.fontSize = '4rem';
            document.body.appendChild(mainHeart);

            const particleCount = 20;
            const hearts = ['💕', '💖', '✨', '💗', '💓', '💞', '💝', '💘'];
            
            for (let i = 0; i < particleCount; i++) {
                const angle = (Math.PI * 2 * i) / particleCount;
                const distance = 150 + Math.random() * 50;
                const px = Math.cos(angle) * distance;
                const py = Math.sin(angle) * distance;

                const particle = document.createElement('div');
                particle.className = 'heart-particle';
                particle.textContent = hearts[Math.floor(Math.random() * hearts.length)];
                particle.style.left = x + 'px';
                particle.style.top = y + 'px';
                particle.style.fontSize = (Math.random() * 1.8 + 1.2) + 'rem';
                particle.style.setProperty('--px', px + 'px');
                particle.style.setProperty('--py', py + 'px');
                particle.style.animation = `particleFly ${Math.random() * 0.5 + 1}s ease-out forwards, particleGlow ${Math.random() * 0.5 + 1}s ease-out forwards`;
                particle.style.animationDelay = (i * 0.04) + 's';
                document.body.appendChild(particle);
                setTimeout(() => particle.remove(), 1500);
            }
            setTimeout(() => mainHeart.remove(), 600);
        }

        const musicBtn = document.getElementById('musicBtn');
        const bgMusic = document.getElementById('bg-music');
        let isPlaying = false;

        musicBtn.addEventListener('click', () => {
            if (isPlaying) {
                bgMusic.pause();
                musicBtn.textContent = '🎵 Play';
                musicBtn.classList.remove('playing');
            } else {
                bgMusic.play();
                musicBtn.textContent = '🎵 Playing';
                musicBtn.classList.add('playing');
            }
            isPlaying = !isPlaying;
        });

        window.addEventListener('load', () => {
            createStars();
            setTimeout(() => { createOpeningFireworks(); }, 300);

            const revealOverlay = document.getElementById('revealOverlay');
            const container = document.querySelector('.container');

            revealOverlay.addEventListener('click', () => {
                revealOverlay.classList.add('hidden');
                container.classList.add('show');
                createFloatingEmojis();
            });

            setTimeout(() => {
                setInterval(() => {
                    if (Math.random() > 0.6) { createFloatingEmojis(); }
                }, 4000);
            }, 3000);
        });

        document.addEventListener('click', (e) => {
            if (e.target.id !== 'musicBtn' && !e.target.classList.contains('photo-frame')) {
                createHeartFireworks(e.clientX, e.clientY);
                setTimeout(() => { createFloatingEmojis(); }, 200);
            }
        });
    </script>
</body>
</html>