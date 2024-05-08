<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
	<meta name="csrf-token" content="lNB3Pp05HW56Av4XyfBwRHIQzbXSWt4RwTcWuypP">
	<title>Laravel</title>

	<script type="module" src="http://[::1]:5173/@vite/client" data-navigate-track="reload"></script>
	<link rel="stylesheet" href="http://[::1]:5173/resources/css/app.css" data-navigate-track="reload" />
	<script type="module" src="http://[::1]:5173/resources/js/app.js" data-navigate-track="reload"></script>
	<!-- Livewire Styles -->
	<style>
		[wire\:loading][wire\:loading],
		[wire\:loading\.delay][wire\:loading\.delay],
		[wire\:loading\.inline-block][wire\:loading\.inline-block],
		[wire\:loading\.inline][wire\:loading\.inline],
		[wire\:loading\.block][wire\:loading\.block],
		[wire\:loading\.flex][wire\:loading\.flex],
		[wire\:loading\.table][wire\:loading\.table],
		[wire\:loading\.grid][wire\:loading\.grid],
		[wire\:loading\.inline-flex][wire\:loading\.inline-flex] {
			display: none;
		}

		[wire\:loading\.delay\.none][wire\:loading\.delay\.none],
		[wire\:loading\.delay\.shortest][wire\:loading\.delay\.shortest],
		[wire\:loading\.delay\.shorter][wire\:loading\.delay\.shorter],
		[wire\:loading\.delay\.short][wire\:loading\.delay\.short],
		[wire\:loading\.delay\.default][wire\:loading\.delay\.default],
		[wire\:loading\.delay\.long][wire\:loading\.delay\.long],
		[wire\:loading\.delay\.longer][wire\:loading\.delay\.longer],
		[wire\:loading\.delay\.longest][wire\:loading\.delay\.longest] {
			display: none;
		}

		[wire\:offline][wire\:offline] {
			display: none;
		}

		[wire\:dirty]:not(textarea):not(input):not(select) {
			display: none;
		}

		:root {
			--livewire-progress-bar-color: #2299dd;
		}

		[x-cloak] {
			display: none !important;
		}
	</style>
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">





	<main class="w-full mx-auto">
		<div class="drawer inline lg:grid lg:drawer-open">
			<input id="" type="checkbox" class="drawer-toggle" />
			<div class="drawer-content w-full mx-auto p-5 lg:px-10 lg:py-5">
				<!-- MAIN CONTENT -->
				<div>
					<label
            x-data="{
                theme: $persist(window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light').as('mary-theme'),
                init() {
                    if (this.theme == 'dark') {
                        this.$refs.sun.classList.add('swap-off');
                        this.$refs.sun.classList.remove('swap-on');
                        this.$refs.moon.classList.add('swap-on');
                        this.$refs.moon.classList.remove('swap-off');
                    }
                    this.setToggle()
                },
                setToggle() {
                    document.documentElement.setAttribute('data-theme', this.theme)
                    document.documentElement.setAttribute('class', this.theme)
                    this.$dispatch('theme-changed', this.theme)
                },
                toggle() {
                    this.theme = this.theme == 'light' ? 'dark' : 'light'
                    this.setToggle()
                }
            }"
            @mary-toggle-theme.window="toggle()"
            class="swap swap-rotate"
        >
            <input type="checkbox" class="theme-controller opacity-0" @click="toggle()" :value="theme" />
            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
            <svg x-ref="sun" class="inline w-5 h-5 swap-on" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"/>
</svg>
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
            <svg x-ref="moon" class="inline w-5 h-5 swap-off" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"/>
</svg>
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->        </label>
				</div>
				<script>
					document.documentElement.setAttribute("data-theme", localStorage.getItem("mary-theme")?.replaceAll("\"", ""))
        document.documentElement.setAttribute("class", localStorage.getItem("mary-theme")?.replaceAll("\"", ""))
				</script>
				<div wire:snapshot="{&quot;data&quot;:{&quot;email&quot;:&quot;&quot;,&quot;password&quot;:&quot;&quot;},&quot;memo&quot;:{&quot;id&quot;:&quot;dlFRB7u7mLUoj8TQydYo&quot;,&quot;name&quot;:&quot;login&quot;,&quot;path&quot;:&quot;\/&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;en&quot;},&quot;checksum&quot;:&quot;34e7f30f452e00b2386522a8331e9730e6fc6373f2eabaa93c5ac4f63a8ff02e&quot;}"
					wire:effects="[]" wire:id="dlFRB7u7mLUoj8TQydYo">

					<div class="md:w-96 mx-auto mt-20">
						<div>
							<img src="https://i.imgur.com/tPvlEdq.jpg" width="40 " class="mb-4 rounded mx-1">
        </div>

							<form wire:submit="login" class="grid grid-flow-row auto-rows-min gap-3"
								wire:submit="login">

								<div>

									<!-- STANDARD LABEL -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- PREFIX/SUFFIX/PREPEND/APPEND CONTAINER -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- PREFIX / PREPEND -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<div class="flex-1 relative">
										<!-- MONEY SETUP -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- INPUT -->
										<input
            id="mary844fa32e9e103ecada581cab66caa6acemail"
            placeholder = " "


            class="input input-primary w-full peer pl-10 h-14 pt-3" type="text" wire:model="email"
        />

										<!-- ICON  -->
										<!--[if BLOCK]><![endif]-->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->
										<svg class="inline w-5 h-5 absolute top-1/2 -translate-y-1/2 left-3 text-gray-400 pointer-events-none"
											xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
											stroke-width="1.5" stroke="currentColor" aria-hidden="true"
											data-slot="icon">
											<path stroke-linecap="round" stroke-linejoin="round"
												d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
										</svg>
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- CLEAR ICON  -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- RIGHT ICON  -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- INLINE LABEL -->
										<!--[if BLOCK]><![endif]--> <label for="mary844fa32e9e103ecada581cab66caa6acemail" class="absolute text-gray-400 duration-300 transform -translate-y-1 scale-75 top-2 origin-[0] rounded px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-1  left-9 ">
                E-mail
            </label>
										<!--[if ENDBLOCK]><![endif]-->

										<!-- HIDDEN MONEY INPUT + END MONEY SETUP -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->
									</div>

									<!-- SUFFIX/APPEND -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- END: PREFIX/SUFFIX/APPEND/PREPEND CONTAINER  -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- ERROR -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- HINT -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->
								</div>
								<div>

									<!-- STANDARD LABEL -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- PREFIX/SUFFIX/PREPEND/APPEND CONTAINER -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- PREFIX / PREPEND -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<div class="flex-1 relative">
										<!-- MONEY SETUP -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- INPUT -->
										<input
            id="mary799fc6e7895bb92b6ea1a470da36c1fbpassword"
            placeholder = " "


            class="input input-primary w-full peer pl-10 h-14 pt-3" type="password" wire:model="password"
        />

										<!-- ICON  -->
										<!--[if BLOCK]><![endif]-->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->
										<svg class="inline w-5 h-5 absolute top-1/2 -translate-y-1/2 left-3 text-gray-400 pointer-events-none"
											xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
											stroke-width="1.5" stroke="currentColor" aria-hidden="true"
											data-slot="icon">
											<path stroke-linecap="round" stroke-linejoin="round"
												d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
										</svg>
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- CLEAR ICON  -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- RIGHT ICON  -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- INLINE LABEL -->
										<!--[if BLOCK]><![endif]--> <label for="mary799fc6e7895bb92b6ea1a470da36c1fbpassword" class="absolute text-gray-400 duration-300 transform -translate-y-1 scale-75 top-2 origin-[0] rounded px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-1  left-9 ">
                Password
            </label>
										<!--[if ENDBLOCK]><![endif]-->

										<!-- HIDDEN MONEY INPUT + END MONEY SETUP -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->
									</div>

									<!-- SUFFIX/APPEND -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- END: PREFIX/SUFFIX/APPEND/PREPEND CONTAINER  -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- ERROR -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->

									<!-- HINT -->
									<!--[if BLOCK]><![endif]-->
									<!--[if ENDBLOCK]><![endif]-->
								</div> <a href="http://lifecoaching.test/forgotpassword" wire:navigate>
									<small> forgot password</small></a>

								<!--[if BLOCK]><![endif]-->
								<hr class="my-3" />

								<div class="flex justify-end gap-3">
									<!--[if BLOCK]><![endif]--> <a href="/register"
										wire:key="maryb6ab6b8e9aa37d9eb25d221f699f841a" type="button"
										class="btn normal-case btn-ghost" wire:navigate>

										<!-- SPINNER LEFT -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- ICON -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- LABEL / SLOT -->
										<!--[if BLOCK]><![endif]--> <span class="">
                Create an account
            </span>
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- ICON RIGHT -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!-- SPINNER RIGHT -->
										<!--[if BLOCK]><![endif]-->
										<!--[if ENDBLOCK]><![endif]-->

										<!--[if BLOCK]><![endif]--> </a>
									<!--[if ENDBLOCK]><![endif]-->
									<!--[if BLOCK]><![endif]--> <button

        wire:key="mary5db068ab5fe6838cbd9bc43f0ea3ef68"
        type="submit"
        class="btn normal-case btn-primary" type="submit"




                    wire:target="login"
            wire:loading.attr="disabled"
            >

        <!-- SPINNER LEFT -->
        <!--[if BLOCK]><![endif]-->            <span wire:loading wire:target="login" class="loading loading-spinner w-5 h-5"></span>
        <!--[if ENDBLOCK]><![endif]-->

        <!-- ICON -->
        <!--[if BLOCK]><![endif]-->            <span class="block"  wire:loading.class="hidden" wire:target="login" >
                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
            <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"/>
</svg>
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->            </span>
        <!--[if ENDBLOCK]><![endif]-->

        <!-- LABEL / SLOT -->
        <!--[if BLOCK]><![endif]-->            <span class="">
                Login
            </span>
            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <!--[if ENDBLOCK]><![endif]-->

        <!-- ICON RIGHT -->
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

        <!-- SPINNER RIGHT -->
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]-->        </button>
									<!--[if ENDBLOCK]><![endif]-->
								</div>
								<!--[if ENDBLOCK]><![endif]-->
							</form>
						</div>
					</div>
				</div>

				<!-- SIDEBAR -->
				<!-- END SIDEBAR-->

			</div>
	</main>

	<!-- FOOTER -->


	<div>
		<div x-persist="mary-toaster">
			<div x-cloak x-data="{ show: false, timer: '', toast: ''}" @mary-toast.window="
                        clearTimeout(timer);
                        toast = $event.detail.toast
                        setTimeout(() => show = true, 100);
                        timer = setTimeout(() => show = false, $event.detail.toast.timeout);
                        ">
				<div class="toast rounded-md fixed cursor-pointer z-50" :class="toast.position" x-show="show"
					x-classes="alert alert-success alert-warning alert-error alert-info top-10 right-10 toast toast-top toast-bottom toast-center toast-end toast-middle toast-start"
					@click="show = false">
					<div class="alert gap-2" :class="toast.css">
						<div x-html="toast.icon"></div>
						<div class="grid">
							<div x-html="toast.title" class="font-bold"></div>
							<div x-html="toast.description" class="text-xs"></div>
						</div>
					</div>
				</div>
			</div>

			<script>
				window.toast = function(payload){
            window.dispatchEvent(new CustomEvent('mary-toast', {detail: payload}))
        }

        document.addEventListener('livewire:init', () => {
            Livewire.hook('request', ({fail}) => {
                fail(({status, content, preventDefault}) => {
                    try {
                        let result = JSON.parse(content);

                        if (result?.toast && typeof window.toast === "function") {
                            window.toast(result);
                        }

                        if ((result?.prevent_default ?? false) === true) {
                            preventDefault();
                        }
                    } catch (e) {
                        console.log(e)
                    }
                })
            })
        })
			</script>
		</div>
	</div><!-- Livewire Scripts -->
	<script src="/livewire/livewire.js?id=44144c23" data-csrf="lNB3Pp05HW56Av4XyfBwRHIQzbXSWt4RwTcWuypP"
		data-update-uri="/livewire/update" data-navigate-once="true"></script>
</body>

</html>