using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;

public partial class register : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite13\App_Data\student1.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();

    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Broken || con.State == ConnectionState.Closed)
        {
            con.Open();
            Response.Write("connection");
        }
        display();
    }
    public void display()
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure4", con);
        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        GridView1.DataSource=ds;
        GridView1.DataBind();
    }
    public void cleardata()
    {
        TextBox1.Text = null;
        TextBox2.Text = null;
        TextBox3.Text = null;
        TextBox4.Text = null;
        TextBox5.Text = null;
        RadioButton1.Checked = false;
        RadioButton2.Checked = false;
        CheckBox1.Checked = false;
        CheckBox2.Checked = false;
        CheckBox3.Checked = false;
        DropDownList1.SelectedIndex = 0;
        DropDownList2.SelectedIndex = 0;
        DropDownList3.SelectedIndex = 0;
    }

    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        //DropDownList3.Items.Clear();

        if (DropDownList2.SelectedValue.Equals("gujarat"))
        {
            DropDownList3.Items.Add("karnatak");
            DropDownList3.Items.Add("rajkot");
            DropDownList3.Items.Add("vapi");
        }
        else if (DropDownList2.SelectedValue.Equals("maha"))
        {
            DropDownList3.Items.Add("nagpur");
            DropDownList3.Items.Add("mumbai");
            DropDownList3.Items.Add("pune");
        }
        else
        {
            DropDownList3.Items.Add("select city");
            DropDownList3.Items.Add("kota");
            DropDownList3.Items.Add("jaipur");
        }
    }

    protected void Button1_Click1(object sender, EventArgs e)
    {
        string genderx = null;
        if (RadioButton1.Checked == true)
        {
            genderx = "male";
        }
        if (RadioButton2.Checked == true)
        {
            genderx = "female";
        }
        string hobby = null;
        if (CheckBox1.Checked == true)
        {
            hobby = hobby + "dancing,";
        }
        if (CheckBox2.Checked == true)
        {
            hobby = hobby + "reading,";
        }
        if (CheckBox3.Checked == true)
        {
            hobby = hobby + "playing,";
        }
        SqlCommand cmd = new SqlCommand("StoredProcedure1", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.Parameters.AddWithValue("@var2", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var3", TextBox3.Text);
        cmd.Parameters.AddWithValue("@var4", genderx);
        cmd.Parameters.AddWithValue("@var5", DropDownList1.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var6", TextBox4.Text);
        cmd.Parameters.AddWithValue("@var7", hobby);
        cmd.Parameters.AddWithValue("@var8", DropDownList2.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var9", DropDownList3.SelectedItem.ToString());
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("insert record");
        display();
        cleardata();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        string genderx = null;
        if (RadioButton1.Checked == true)
        {
            genderx = "male";
        }
        if (RadioButton2.Checked == true)
        {
            genderx = "female";
        }
        string hobby = null;
        if (CheckBox1.Checked == true)
        {
            hobby = hobby + "dancing,";
        }
        if (CheckBox2.Checked == true)
        {
            hobby = hobby + "reading,";
        }
        if (CheckBox3.Checked == true)
        {
            hobby = hobby + "playing,";
        }
        SqlCommand cmd = new SqlCommand("StoredProcedure2", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.Parameters.AddWithValue("@var2", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var3", TextBox3.Text);
        cmd.Parameters.AddWithValue("@var4", genderx);
        cmd.Parameters.AddWithValue("@var5", DropDownList1.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var6", TextBox4.Text);
        cmd.Parameters.AddWithValue("@var7", hobby);
        cmd.Parameters.AddWithValue("@var8", DropDownList2.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var9", DropDownList3.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var10", TextBox5.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("update record");
        display();
        cleardata();
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {

        TextBox5.Text = GridView1.SelectedRow.Cells[1].Text;
        TextBox1.Text = GridView1.SelectedRow.Cells[2].Text;
        TextBox2.Text = GridView1.SelectedRow.Cells[3].Text;
        TextBox3.Text = GridView1.SelectedRow.Cells[4].Text;
        String gender = GridView1.SelectedRow.Cells[5].Text;
        Response.Write(gender);
        if (gender=="male")
        {
            RadioButton1.Checked = true;
            RadioButton2.Checked = false;
        }
        if (gender == "female")
        {
            RadioButton2.Checked = true;
            RadioButton1.Checked = false;
        }
        DropDownList1.SelectedValue = GridView1.SelectedRow.Cells[6].Text;
        TextBox4.Text = GridView1.SelectedRow.Cells[6].Text;

        DropDownList2.SelectedValue = GridView1.SelectedRow.Cells[9].Text;
        DropDownList3.SelectedValue = GridView1.SelectedRow.Cells[10].Text;
        
   
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure3", con);
        cmd.Parameters.AddWithValue("@var1", TextBox5.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("delete record");
        display();
        cleardata();
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure6", con);
        cmd.Parameters.AddWithValue("@var1", TextBox5.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
    }
}
