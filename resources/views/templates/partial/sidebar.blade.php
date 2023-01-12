<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('students') ? 'active' : '' }}">
                <a href="{{ route('students.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Siswa</span>
                </a>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>Jobie Dashboard</strong> © 2022 All Rights Reserved</p>
            <p>by DexignZone</p>
        </div>
    </div>
</div>
