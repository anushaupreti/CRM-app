<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Service;
use App\Models\Student;
use Livewire\Component;

class StudentServiceLevel extends Component
{
    public $students;
    public $services;
    public $levels;

    public $selectedStudent = Null;
    public $selectedService = Null;
    public $selectedLevel = Null;

    public function mount($selectedLevel= null){
        $this->students = Student::all();
        $this->services = collect();
        $this->levels = collect();
        $this->selectedLevel = $selectedLevel;

        if(!is_null($selectedLevel)){
            $level = Level::with('student.service')->find($selectedLevel);
            if($level){
                $this->levels = Level::where('service_id', $level->service_id)->get();
                $this->services = Service::where('level_id', $level->service->student_id)->get();
                $this->selectedStudent = $level->service->student_id;
                $this->selectedService = $level->service_id;
            }
        }
    }
    public function render()
    {
        return view('livewire.student-service-level');
    }

    public function UpdatedSelectedStudent($student)
    {
        $this->services = Service::where('student_id', $student)->get();
        $this->selectedService = Null;
    }
    public function UpdatedSelectedService($service)
    {
        if(!is_null($service)){
            $this->levels = Level::where('service_id', $service)->get();
        } 
    }
}
