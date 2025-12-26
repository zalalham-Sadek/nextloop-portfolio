import './bootstrap';

// Sticky Header on Scroll
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('header');

    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 20) {
                header.classList.add('shadow-md');
            } else {
                header.classList.remove('shadow-md');
            }
        });
    }

    // Menu Toggle Functionality
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const slideMenu = document.getElementById('slide-menu');
    const menuOverlay = document.getElementById('menu-overlay');
    const body = document.body;

    function openMenu() {
        const isRTL = document.documentElement.dir === 'rtl';
        if (isRTL) {
            slideMenu.classList.remove('-translate-x-full');
        } else {
            slideMenu.classList.remove('translate-x-full');
        }
        menuOverlay.classList.remove('hidden');
        body.style.overflow = 'hidden';
    }

    // Make closeMenu available globally for onclick handlers
    window.closeMenu = function() {
        const isRTL = document.documentElement.dir === 'rtl';
        if (isRTL) {
            slideMenu.classList.add('-translate-x-full');
        } else {
            slideMenu.classList.add('translate-x-full');
        }
        menuOverlay.classList.add('hidden');
        body.style.overflow = '';
    };
    
    const closeMenu = window.closeMenu;

    if (menuToggle) {
        menuToggle.addEventListener('click', openMenu);
    }

    if (menuClose) {
        menuClose.addEventListener('click', closeMenu);
    }

    if (menuOverlay) {
        menuOverlay.addEventListener('click', closeMenu);
    }

    // Close menu on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const isRTL = document.documentElement.dir === 'rtl';
            const isHidden = isRTL ? slideMenu.classList.contains('-translate-x-full') : slideMenu.classList.contains('translate-x-full');
            if (!isHidden) {
                closeMenu();
            }
        }
    });

    // Counter Animation
    const counters = document.querySelectorAll('.counter');

    const animateCounter = (counter) => {
        const target = +counter.dataset.target;
        const suffix = counter.dataset.suffix || '';
        const duration = 2000; // 2 seconds
        let start = 0;
        let startTime = null;

        const updateCount = (timestamp) => {
            if (!startTime) startTime = timestamp;
            const progress = (timestamp - startTime) / duration;
            const current = Math.min(progress * target, target);
            counter.textContent = Math.floor(current) + suffix;

            if (current < target) {
                requestAnimationFrame(updateCount);
            }
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    requestAnimationFrame(updateCount);
                    observer.unobserve(counter); // Stop observing once animation starts
                }
            });
        }, { threshold: 0.5 }); // Trigger when 50% of the element is visible

        observer.observe(counter);
    };

    counters.forEach(animateCounter);

    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Scroll to Top Button
    const scrollTopBtn = document.getElementById('scroll-top');
    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Show/hide button on scroll
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                scrollTopBtn.classList.add('opacity-100');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'pointer-events-none');
                scrollTopBtn.classList.remove('opacity-100');
            }
        });
    }

           // Projects Cards Drag Navigation
           const cardsContainer = document.getElementById('cards-container');
           const cards = document.querySelectorAll('.project-card');
           
           if (cardsContainer && cards.length > 0) {
               let currentIndex = 0;
               const totalCards = Math.max(cards.length, 1); // Ensure at least 1 card
        let isDragging = false;
        let startY = 0;
        let currentY = 0;
        let offsetY = 0;

        function updateCards(dragOffset = 0, isDraggingNow = false) {
            cards.forEach((card) => {
                const cardIndex = parseInt(card.dataset.index);
                
                // Calculate relative index (how many cards away from current)
                let relativeIndex = (cardIndex - currentIndex + totalCards) % totalCards;
                if (relativeIndex > totalCards / 2) {
                    relativeIndex = relativeIndex - totalCards;
                }
                
                const isTopCard = relativeIndex === 0;
                
                // Remove transition during drag for instant response (only for top card)
                if (isDraggingNow && isTopCard) {
                    card.style.transition = 'none';
                } else if (!isDraggingNow && isTopCard) {
                    card.style.transition = 'transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.4s ease-out';
                } else {
                    card.style.transition = 'transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.4s ease-out';
                }
                
                // Calculate position and scale
                const baseOffset = Math.abs(relativeIndex) * 25; // 25px offset per card
                let offset = baseOffset;
                
                // Only the top card moves with drag
                if (isTopCard) {
                    offset = dragOffset;
                }
                
                const scale = 1 - (Math.abs(relativeIndex) * 0.08); // Scale down by 8% per card
                
                // Adjust opacity and add rotation for realistic drag effect (only for top card)
                let opacity = relativeIndex === 0 ? 1 : Math.abs(relativeIndex) === 1 ? 0.8 : 0.5;
                let rotation = 0;
                
                if (isTopCard && isDraggingNow) {
                    // Add slight rotation based on drag direction for realistic effect
                    rotation = dragOffset * 0.1; // Slight rotation while dragging
                    // Fade out current card as you drag more
                    const dragProgress = Math.abs(dragOffset) / 200;
                    opacity = Math.max(0.6, 1 - dragProgress * 0.4);
                }
                
                const zIndex = totalCards - Math.abs(relativeIndex);
                
                // Apply transforms with rotation for realistic drag (only top card gets rotation)
                card.style.transform = `translateY(${offset}px) scale(${scale}) rotate(${rotation}deg)`;
                card.style.opacity = opacity;
                card.style.zIndex = zIndex;
            });
        }

        function nextCard() {
            currentIndex = (currentIndex + 1) % totalCards;
            updateCards(0, false);
        }

        function prevCard() {
            currentIndex = (currentIndex - 1 + totalCards) % totalCards;
            updateCards(0, false);
        }

        // Mouse drag events
        cardsContainer.addEventListener('mousedown', (e) => {
            // Don't start drag on links or buttons
            if (e.target.closest('a') || e.target.closest('button')) return;
            
            isDragging = true;
            startY = e.clientY;
            cardsContainer.style.cursor = 'grabbing';
            e.preventDefault();
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            currentY = e.clientY;
            offsetY = currentY - startY;
            
            // No limit on drag distance for more realistic free movement
            // Apply drag with realistic movement - card follows cursor directly
            updateCards(offsetY, true);
        });

        document.addEventListener('mouseup', (e) => {
            if (!isDragging) return;
            isDragging = false;
            cardsContainer.style.cursor = 'grab';
            
            // Determine if we should change card based on drag distance
            // Drag up (negative offset) = next card
            // Drag down (positive offset) = prev card
            const threshold = 80; // Increased threshold for more intentional drag
            if (offsetY < -threshold) {
                nextCard(); // Drag up = next
            } else if (offsetY > threshold) {
                prevCard(); // Drag down = prev
            } else {
                updateCards(0, false); // Reset to current card with smooth transition
            }
            
            offsetY = 0;
        });

        // Touch drag events
        cardsContainer.addEventListener('touchstart', (e) => {
            // Don't start drag on links or buttons
            if (e.target.closest('a') || e.target.closest('button')) return;
            
            isDragging = true;
            startY = e.touches[0].clientY;
        }, { passive: false });

        cardsContainer.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            currentY = e.touches[0].clientY;
            offsetY = currentY - startY;
            
            // No limit on drag distance for more realistic free movement
            // Apply drag with realistic movement - card follows finger directly
            updateCards(offsetY, true);
            e.preventDefault();
        }, { passive: false });

        cardsContainer.addEventListener('touchend', (e) => {
            if (!isDragging) return;
            isDragging = false;
            
            // Determine if we should change card based on drag distance
            // Drag up (negative offset) = next card
            // Drag down (positive offset) = prev card
            const threshold = 80; // Increased threshold for more intentional drag
            if (offsetY < -threshold) {
                nextCard(); // Drag up = next
            } else if (offsetY > threshold) {
                prevCard(); // Drag down = prev
            } else {
                updateCards(0, false); // Reset to current card with smooth transition
            }
            
            offsetY = 0;
            e.preventDefault();
        }, { passive: false });

        // Initialize cards
        updateCards();
    }
});
