<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CascadingDropdown extends Component
{
    public $continents = [];
    public $countries = [];

    public $selectedContinent;
    public $selectedCountry;
    
    public function render()
    {
        return view('livewire.cascading-dropdown');
    }

    public function mount(){
        // $countriesObject = new \stdClass;
        // $countriesObject->id = 1;
        // $countriesObject->name = 'uno';
        // $this->countries = $countriesObject;

        $this->continents = [
            [
                'id' => 1,
                'name' => 'America',
            ],
            [
                'id' => 2,
                'name' => 'Europe',
            ],
            [
                'id' => 3,
                'name' => 'Asia',
            ],
        ];
    }

    public function changeContinent(){
        // dd($this->selectedCountry);
        // $this->selectedCountry = 2;
        if($this->selectedContinent !== '-1'){
            switch($this->selectedContinent){
                case 1:
                    $this->countries = [
                        [
                            'id' => 1,
                            'name' => 'México',
                        ],
                        [
                            'id' => 2,
                            'name' => 'USA',
                        ],
                        [
                            'id' => 3,
                            'name' => 'Canadá',
                        ],
                    ];
                    break;
                case 2:
                    $this->countries = [
                        [
                            'id' => 1,
                            'name' => 'Spain',
                        ],
                        [
                            'id' => 2,
                            'name' => 'France',
                        ],
                        [
                            'id' => 3,
                            'name' => 'England',
                        ],
                    ];
                    break;
                case 3:
                    $this->countries = [
                        [
                            'id' => 1,
                            'name' => 'Japan',
                        ],
                        [
                            'id' => 2,
                            'name' => 'China',
                        ],
                        [
                            'id' => 3,
                            'name' => 'Thailand',
                        ],
                    ];
                    break;                
            }

            // $this->countries = [
            //     [
            //         'id' => 1,
            //         'name' => 'uno',
            //     ],
            //     [
            //         'id' => 2,
            //         'name' => 'dos',
            //     ],
            //     [
            //         'id' => 3,
            //         'name' => 'tres',
            //     ],
            // ];
           
        }
    }
}
