<?php
/**
 * Created by PhpStorm.
 * Date: 2023/12/20 17:29
 */

namespace App\reflection;

class Student
{
    private string $name;
    private int $age;
    private string $sex;

    /**
     * @param string $name
     * @param int $age
     * @param string $sex
     */
    public function __construct(string $name, int $age, string $sex)
    {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Student
     */
    public function setName(string $name): Student
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return Student
     */
    public function setAge(int $age): Student
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     * @return Student
     */
    public function setSex(string $sex): Student
    {
        $this->sex = $sex;

        return $this;
    }
}