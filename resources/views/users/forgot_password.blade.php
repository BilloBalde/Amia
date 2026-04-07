<!DOCTYPE html>
<html lang="fr">
@include('layouts.head')
<head>
    <style>
        /* Additional custom styles for enhanced design */
        .forgot-password-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .login-wrapper {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        
        .login-content {
            padding: 40px;
            background: white;
        }
        
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-logo img {
            max-height: 60px;
            transition: transform 0.3s ease;
        }
        
        .login-logo img:hover {
            transform: scale(1.05);
        }
        
        .login-userheading {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-userheading h3 {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }
        
        .login-userheading h3:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 3px;
        }
        
        .login-userheading h4 {
            font-size: 15px;
            color: #666;
            font-weight: 400;
            line-height: 1.6;
            margin-top: 15px;
        }
        
        .form-login {
            margin-bottom: 20px;
        }
        
        .form-login label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
            font-size: 14px;
        }
        
        .form-addons {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .form-addons input {
            width: 100%;
            height: 50px;
            padding: 0 45px 0 15px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        
        .form-addons input:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }
        
        .form-addons input::placeholder {
            color: #999;
            font-size: 14px;
        }
        
        .form-addons img {
            position: absolute;
            right: 15px;
            width: 20px;
            height: 20px;
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }
        
        .form-addons input:focus + img {
            opacity: 1;
        }
        
        .invalid-feedback {
            display: block;
            margin-top: 8px;
            font-size: 13px;
            color: #dc3545;
            padding-left: 5px;
        }
        
        .btn-login {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-login:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .alreadyuser {
            text-align: center;
            margin: 20px 0;
            padding: 15px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }
        
        .alreadyuser h4 {
            font-size: 15px;
            color: #666;
            margin: 0;
        }
        
        .hover-a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
            position: relative;
        }
        
        .hover-a:hover {
            color: #764ba2;
        }
        
        .hover-a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: width 0.3s ease;
        }
        
        .hover-a:hover::after {
            width: 100%;
        }
        
        .login-img {
            position: relative;
            overflow: hidden;
            min-height: 100%;
        }
        
        .login-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .login-img:hover img {
            transform: scale(1.05);
        }
        
        .login-img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.3) 0%, rgba(118, 75, 162, 0.3) 100%);
            z-index: 1;
        }
        
        .login-img::after {
            content: '🔐 Sécurisé & Fiable';
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 18px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            z-index: 2;
            background: rgba(0,0,0,0.3);
            padding: 10px 20px;
            border-radius: 30px;
            backdrop-filter: blur(5px);
            white-space: nowrap;
        }
        
        /* Animation for form appearance */
        .login-content {
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Success/Error message styling */
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            animation: slideDown 0.3s ease;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .alert-danger {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        
        .alert::before {
            content: '✓';
            display: inline-block;
            width: 24px;
            height: 24px;
            background: #28a745;
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
            margin-right: 10px;
            font-weight: bold;
        }
        
        .alert-danger::before {
            content: '⚠';
            background: #dc3545;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-content {
                padding: 30px 20px;
            }
            
            .login-img::after {
                font-size: 14px;
                padding: 8px 16px;
                white-space: normal;
                width: 90%;
                text-align: center;
            }
            
            .login-userheading h3 {
                font-size: 24px;
            }
        }
        
        /* Loading state for button */
        .btn-login.loading {
            pointer-events: none;
            opacity: 0.8;
        }
        
        .btn-login.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Input icon animation */
        .form-addons {
            position: relative;
        }
        
        .form-addons .input-icon {
            position: absolute;
            right: 15px;
            transition: all 0.3s ease;
        }
        
        /* Password reset info box */
        .reset-info {
            background: #e3f2fd;
            border-radius: 12px;
            padding: 15px;
            margin: 20px 0;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            border-left: 4px solid #2196f3;
        }
        
        .reset-info .info-icon {
            font-size: 24px;
            line-height: 1;
        }
        
        .reset-info .info-text {
            flex: 1;
        }
        
        .reset-info .info-text p {
            margin: 0;
            font-size: 13px;
            color: #0c5460;
        }
        
        .reset-info .info-text strong {
            display: block;
            margin-bottom: 5px;
            color: #0b5e7e;
            font-size: 14px;
        }
    </style>
</head>
<body class="account-page forgot-password-container">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="EDAAG TRADING">
                        </div>
                        
                        <div class="login-userheading">
                            <h3>Mot de passe oublié ?</h3>
                            <h4>Ne vous inquiétez pas, nous vous enverrons un lien de réinitialisation par email.</h4>
                            @include('layouts.flash')
                        </div>

                        <!-- Info box -->
                        <div class="reset-info">
                            <div class="info-icon">📧</div>
                            <div class="info-text">
                                <strong>Comment ça fonctionne ?</strong>
                                <p>Entrez votre adresse email ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe en toute sécurité.</p>
                            </div>
                        </div>

                        <form action="{{ route('password.email') }}" method="POST" id="forgotPasswordForm">
                            @csrf
                            <div class="form-login">
                                <label for="email">Adresse email</label>
                                <div class="form-addons">
                                    <input 
                                        id="email"
                                        name="email" 
                                        type="email" 
                                        placeholder="exemple@domaine.com"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                    >
                                    <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="email icon" class="input-icon">
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-login">
                                <div class="alreadyuser">
                                    <h4>
                                        <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>
                                        <a href="{{ route('login') }}" class="hover-a">Retour à la connexion</a>
                                    </h4>
                                </div>
                            </div>

                            <div class="form-login">
                                <button type="submit" class="btn btn-login" id="submitBtn">
                                    <span class="btn-text">Envoyer le lien de réinitialisation</span>
                                    <span class="btn-icon" style="margin-left: 8px;">→</span>
                                </button>
                            </div>
                        </form>

                        <!-- Additional help text -->
                        <div style="text-align: center; margin-top: 20px; font-size: 13px; color: #999;">
                            <p>Vous rencontrez des problèmes ? <a href="mailto:support@edaag.com" style="color: #667eea; text-decoration: none;">Contactez le support</a></p>
                        </div>
                    </div>
                </div>
                
                <div class="login-img">
                    <img src="{{ asset('assets/img/login.jpg') }}" alt="Login background">
                </div>
            </div>
        </div>
    </div>

    @include('layouts.scripts')
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('forgotPasswordForm');
            const submitBtn = document.getElementById('submitBtn');
            const emailInput = document.getElementById('email');

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                if (emailInput.value.trim() === '') {
                    e.preventDefault();
                    showError('Veuillez entrer votre adresse email');
                    return;
                }

                if (!isValidEmail(emailInput.value)) {
                    e.preventDefault();
                    showError('Veuillez entrer une adresse email valide');
                    return;
                }

                // Show loading state
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
                
                // Change button text
                const btnText = submitBtn.querySelector('.btn-text');
                if (btnText) {
                    btnText.textContent = 'Envoi en cours...';
                }
            });

            // Email validation
            function isValidEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            // Show error message
            function showError(message) {
                // Remove existing error if any
                const existingError = document.querySelector('.custom-error');
                if (existingError) {
                    existingError.remove();
                }

                // Create error element
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger custom-error';
                errorDiv.style.marginTop = '10px';
                errorDiv.style.marginBottom = '0';
                errorDiv.innerHTML = message;

                // Insert after email field
                const emailField = document.querySelector('.form-login');
                if (emailField) {
                    emailField.parentNode.insertBefore(errorDiv, emailField.nextSibling);
                }

                // Remove error after 3 seconds
                setTimeout(() => {
                    if (errorDiv.parentNode) {
                        errorDiv.remove();
                    }
                }, 3000);
            }

            // Real-time email validation with visual feedback
            emailInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    if (isValidEmail(this.value)) {
                        this.style.borderColor = '#28a745';
                        this.style.background = '#f0fff4';
                    } else {
                        this.style.borderColor = '#dc3545';
                        this.style.background = '#fff5f5';
                    }
                } else {
                    this.style.borderColor = '#e0e0e0';
                    this.style.background = '#f8f9fa';
                }
            });

            // Add smooth scroll to any alerts
            if (document.querySelector('.alert')) {
                document.querySelector('.alert').scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
            }

            // Add keyboard shortcut (Enter) for form submission
            emailInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && !submitBtn.disabled) {
                    e.preventDefault();
                    form.dispatchEvent(new Event('submit'));
                }
            });

            // Add floating label effect
            emailInput.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            emailInput.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });

            // Add animation to the lock icon on the image
            const loginImg = document.querySelector('.login-img');
            if (loginImg) {
                setInterval(() => {
                    loginImg.classList.add('pulse');
                    setTimeout(() => {
                        loginImg.classList.remove('pulse');
                    }, 500);
                }, 3000);
            }
        });

        // Add pulse animation CSS
        const style = document.createElement('style');
        style.textContent = `
            .login-img.pulse::after {
                transform: translateX(-50%) scale(1.05);
                background: rgba(0,0,0,0.4);
                transition: all 0.3s ease;
            }
            
            .form-addons.focused label {
                color: #667eea;
            }
            
            .btn-login .btn-icon {
                transition: transform 0.3s ease;
            }
            
            .btn-login:hover .btn-icon {
                transform: translateX(5px);
            }
        `;
        document.head.appendChild(style);
    </script>

    <!-- Add Font Awesome for icons if not already included -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>