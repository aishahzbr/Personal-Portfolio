<!-- ====== Contact Section Start -->
<section id="contact" class="bg-white dark:bg-primary py-20 lg:py-[120px] overflow-hidden relative z-10">
  <div class="container">
    <div class="flex flex-wrap lg:justify-between -mx-4">
      <div class="w-full lg:w-1/2 xl:w-6/12 px-4">
        <div class="max-w-[570px] mb-12 lg:mb-0">
          <h2 class="text-dark dark:text-gray-100 mb-6 uppercase font-bold text-[32px] sm:text-[40px] lg:text-[36px] xl:text-[40px]">
            FOR BUSINESS ENQUIRIES
          </h2>
          <p class="text-base text-body-color dark:text-gray-200 leading-relaxed mb-9">
            If you feel my experience and skills fits your needs, feel free to contact me.
          </p>
          <div class="flex mb-8 max-w-[370px] w-full">
            
            <a
              class="
                w-20
                h-10
                flex
                items-center
                justify-center
                text-dark
                dark:text-white
                hover:dark:border-primary
                mr-3
                sm:mr-4
                lg:mr-3
                xl:mr-4
              "
            >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 60" width="30px" height="30px" class="fill-current">
            <path d="M66.097,12.089h-56.9C4.126,12.089,0,16.215,0,21.286v32.722c0,5.071,4.126,9.197,9.197,9.197h56.9
              c5.071,0,9.197-4.126,9.197-9.197V21.287C75.295,16.215,71.169,12.089,66.097,12.089z M61.603,18.089L37.647,33.523L13.691,18.089
              H61.603z M66.097,57.206h-56.9C7.434,57.206,6,55.771,6,54.009V21.457l29.796,19.16c0.04,0.025,0.083,0.042,0.124,0.065
              c0.043,0.024,0.087,0.047,0.131,0.069c0.231,0.119,0.469,0.215,0.712,0.278c0.025,0.007,0.05,0.01,0.075,0.016
              c0.267,0.063,0.537,0.102,0.807,0.102c0.001,0,0.002,0,0.002,0c0.002,0,0.003,0,0.004,0c0.27,0,0.54-0.038,0.807-0.102
              c0.025-0.006,0.05-0.009,0.075-0.016c0.243-0.063,0.48-0.159,0.712-0.278c0.044-0.022,0.088-0.045,0.131-0.069
              c0.041-0.023,0.084-0.04,0.124-0.065l29.796-19.16v32.551C69.295,55.771,67.86,57.206,66.097,57.206z"/>            
            </svg>

            </a>
            <div class="w-full">
              <h4 class="font-bold text-dark dark:text-gray-200 text-xl mb-1">
                Email Address
              </h4>
              <p class="text-base text-body-color dark:text-gray-300">sitiaishah.ahmadzubir@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
        <div class="bg-white dark:bg-slate-900 relative rounded-lg p-8 sm:p-12 shadow-lg">
          <form action="/contact/submit" method="POST" x-data="
          {
              formData: {
                name: '',
                email: '',
                message: '',
              },
              errors: {},
              successMessage: '',
              submitForm(event) {
                console.log('Form submitted');

                if (this.isSubmitting) {
                  console.log('Form already being submitted');
                  return;
                }

                this.isSubmitting = true;

                this.successMessage = '';
                this.errors = {};

                fetch(`/contact/submit`, {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector(`meta[name='csrf-token']`).getAttribute('content')
                  },
                  body: JSON.stringify(this.formData)
                })
                  .then(response => {
                    if (response.status === 200) {
                      return response.json();
                    }
                    throw response;
                  })
                  .then(result => {
                    this.formData = {
                      name: '',
                      email: '',
                      message: '',
                    };
                    this.successMessage = 'Thanks for your contact request. I will get back to you shortly.';

                    // Add a delay to ensure the successMessage is updated before checking the template
                    setTimeout(() => {
                      this.isSubmitting = false;
                    }, 0);
                  })
                  .catch(async (response) => {
                    const res = await response.json();
                    if (response.status === 422) {
                      this.errors = res.errors;
                    }
                    console.log(res);
                  });
              }

          }
          " x-on:submit.prevent="submitForm">
            <div x-show="successMessage" class="py-4 px-6 bg-green-600 text-gray-100 mb-4" x-text="successMessage"></div>

            @csrf
            <div class="mb-6">
              <x-forms.input placeholder="Your Name" name="name" x-model="formData.name" ::class="errors.name ? 'border-red-500 focus:border-red-500' : ''"></x-forms.input>
              <template x-if="errors.name">
                <div x-text="errors.name[0]" class="text-red-500"></div>
              </template>
            </div>
            <div class="mb-6">
              <x-forms.input type="email" placeholder="Your Email" name="email" x-model="formData.email" ::class="errors.email ? 'border-red-500 focus:border-red-500' : ''"></x-forms.input>
              <template x-if="errors.email">
                <div x-text="errors.email[0]" class="text-red-500"></div>
              </template>
            </div>
            <div class="mb-6">
              <x-forms.textarea placeholder="Your Message" name="message" rows="6" x-model="formData.message" ::class="errors.message ? 'border-red-500 focus:border-red-500' : ''"></x-forms.textarea>
              <template x-if="errors.message">
                <div x-text="errors.message[0]" class="text-red-500"></div>
              </template>
            </div>
            <div>
              <x-button class="w-full" x-bind:disabled="successMessage !== ''">
                Send Message
              </x-button>
            </div>
          </form>
          <div>
            <span class="absolute -top-10 -right-9 z-[-1]">
               <svg
                 width="100"
                 height="100"
                 viewBox="0 0 100 100"
                 fill="none"
                 xmlns="http://www.w3.org/2000/svg"
               >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0 100C0 44.7715 0 0 0 0C55.2285 0 100 44.7715 100 100C100 100 100 100 0 100Z"
                    fill="#3056D3"
                  />
               </svg>
            </span>
            <x-contact-dots-top></x-contact-dots-top>
            <x-contact-dots-bottom></x-contact-dots-bottom>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Contact Section End -->