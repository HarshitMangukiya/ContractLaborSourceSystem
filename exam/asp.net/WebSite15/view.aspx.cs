﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;

public partial class view : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite15\App_Data\studentx.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();

    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Broken || con.State == ConnectionState.Closed)
        {
            con.Open();
            Response.Write("connction");
        }
        //if (Session["new"] == null)
        //{
        //    Response.Redirect("login.aspx");

        //}
        display();
    }
    public void display()
    {
        SqlDataAdapter adp = new SqlDataAdapter("StoredProcedure5", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
    }
    public void cleardata()
    {
        TextBox1.Text = "";
        TextBox2.Text = "";
        TextBox4.Text = "";
        TextBox5.Text = "";
        TextBox6.Text = "";
        RadioButton1.Checked = false;
        RadioButton2.Checked = false;
        CheckBox1.Checked = false;
        CheckBox2.Checked = false;
        CheckBox3.Checked = false;
        DropDownList1.SelectedIndex = 0;
        DropDownList2.SelectedIndex = 0;
        DropDownList3.SelectedIndex = 0;
        DropDownList4.SelectedIndex = 0;
        DropDownList5.SelectedIndex = 0;
        DropDownList6.SelectedIndex = 0;
        DropDownList7.SelectedIndex = 0;

    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        string genderx = "";
        if (RadioButton1.Checked == true)
        {
            genderx = "male";
        }
        if (RadioButton2.Checked == true)
        {
            genderx = "female";
        }

        string hobbyx = "";
        if (CheckBox1.Checked == true)
        {
            hobbyx = hobbyx + "dancing,";
        }
        if (CheckBox2.Checked == true)
        {
            hobbyx = hobbyx + "reading";
        }
        if (CheckBox3.Checked == true)
        {
            hobbyx = hobbyx + "writing";
        }
        string f_name = FileUpload1.FileName;
        FileUpload1.SaveAs(Server.MapPath("./image/" + f_name));

        Image1.ImageUrl = "./image/" + f_name;

        SqlCommand cmd = new SqlCommand("StoredProcedure3", con);
        cmd.Parameters.AddWithValue("@var1", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var2", TextBox4.Text);
        cmd.Parameters.AddWithValue("@var3", genderx);
        cmd.Parameters.AddWithValue("@var4", DropDownList1.SelectedValue);
        cmd.Parameters.AddWithValue("@var5", hobbyx);               
        cmd.Parameters.AddWithValue("@var6", DropDownList2.SelectedValue);
        cmd.Parameters.AddWithValue("@var7", TextBox5.Text);
        cmd.Parameters.AddWithValue("@var8", DropDownList3.SelectedValue);
        cmd.Parameters.AddWithValue("@var9", DropDownList4.SelectedValue);
        cmd.Parameters.AddWithValue("@var10", DropDownList5.SelectedValue);
        cmd.Parameters.AddWithValue("@var11", Image1.ImageUrl);
        cmd.Parameters.AddWithValue("@var12", TextBox6.Text);
        cmd.Parameters.AddWithValue("@var13", TextBox1.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("update record");
        display();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string genderx="";
        if(RadioButton1.Checked==true)
        {
            genderx="male";
        }
        if(RadioButton2.Checked==true)
        {
            genderx="female";
        }

        string hobbyx = "";
        if (CheckBox1.Checked == true)
        {
            hobbyx = hobbyx + "dancing,";
        }
        if (CheckBox2.Checked == true)
        {
            hobbyx = hobbyx + "reading";
        }
        if (CheckBox3.Checked == true)
        {
            hobbyx = hobbyx + "writing";
        }
        string f_name = FileUpload1.FileName;
        FileUpload1.SaveAs(Server.MapPath("./image/"+f_name));

        Image1.ImageUrl = "./image/" + f_name;

        SqlCommand cmd = new SqlCommand("StoredProcedure1", con);
        cmd.Parameters.AddWithValue("@var1", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var2", TextBox4.Text);
        cmd.Parameters.AddWithValue("@var3", genderx);
        cmd.Parameters.AddWithValue("@var4", DropDownList1.SelectedValue);
        cmd.Parameters.AddWithValue("@var5", hobbyx);
        cmd.Parameters.AddWithValue("@var6", DropDownList2.SelectedValue);
        cmd.Parameters.AddWithValue("@var7", TextBox5.Text);
        cmd.Parameters.AddWithValue("@var8", DropDownList3.SelectedValue);
        cmd.Parameters.AddWithValue("@var9", DropDownList4.SelectedValue);
        cmd.Parameters.AddWithValue("@var10",DropDownList5.SelectedValue);
        cmd.Parameters.AddWithValue("@var11",Image1.ImageUrl);
        cmd.Parameters.AddWithValue("@var12", TextBox6.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("insert record");
        display();
        cleardata();
    }
    protected void DropDownList3_SelectedIndexChanged(object sender, EventArgs e)
    {
        //DropDownList4.Items.Clear();
  

        if (DropDownList3.SelectedValue.Equals("india"))
        {

            DropDownList4.Items.Add("Gujarat");
            DropDownList4.Items.Add("Maharastra");
        }
        else
        {

            DropDownList4.Items.Add("California");
            DropDownList4.Items.Add("New York");
        }
    }
    protected void DropDownList4_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList5.Items.Clear();
        if (DropDownList4.SelectedValue.Equals("Gujarat"))
        {

            DropDownList5.Items.Add("surat");
            DropDownList5.Items.Add("vapi");
        }
        else
        {

            DropDownList5.Items.Add("California");
            DropDownList5.Items.Add("New York");
        }
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure6", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.CommandType = CommandType.StoredProcedure;

        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();

    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure4", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("delete record");
        display();
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList4.Items.Add("Gujarat");
        DropDownList4.Items.Add("Maharastra");
        DropDownList4.Items.Add("California");
        DropDownList4.Items.Add("New York");
        DropDownList5.Items.Add("surat");
        DropDownList5.Items.Add("vapi");
        DropDownList5.Items.Add("California");
        DropDownList5.Items.Add("New York");
        TextBox1.Text = GridView1.SelectedRow.Cells[1].Text;
        TextBox2.Text = GridView1.SelectedRow.Cells[2].Text;
        TextBox4.Text = GridView1.SelectedRow.Cells[3].Text;
        string genderx = GridView1.SelectedRow.Cells[4].Text;
        if (genderx == "male")
        {
            RadioButton1.Checked = true;
            RadioButton2.Checked = false;
        }
        if (genderx == "female")
        {
            RadioButton1.Checked = false;
            RadioButton2.Checked = true;
        }
        DropDownList1.SelectedValue = GridView1.SelectedRow.Cells[5].Text;
        DropDownList2.SelectedValue = GridView1.SelectedRow.Cells[7].Text;
        TextBox5.Text = GridView1.SelectedRow.Cells[8].Text;
        DropDownList3.SelectedValue = GridView1.SelectedRow.Cells[9].Text;
        DropDownList4.SelectedValue = GridView1.SelectedRow.Cells[10].Text;
        DropDownList5.SelectedValue = GridView1.SelectedRow.Cells[11].Text;
        TextBox6.Text = GridView1.SelectedRow.Cells[13].Text;

    }
    
    protected void DropDownList6_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList7.Items.Clear();
        string country = DropDownList6.SelectedValue;
        string[] india = { "Gujarat", "Maharashtra", "Delhi", "Kerela" };
        string[] germany = { "Berlin", "Munich", "Aachen", "Dreggendorf" };
        string[] canada = { "Toronto", "Alberta", "Saschechwan", "Niagra" };
        string[] usa = { "Florida", "California", "Texas", "Boston" };
        if (country == "India")
        {
            for (int i = 0; i < india.Length; i++)
            {
                DropDownList7.Items.Add(india[i]);
            }
        }
        else if (country == "Canada")
        {
            for (int i = 0; i < india.Length; i++)
            {
                DropDownList7.Items.Add(canada[i]);
            }
        }
        else if (country == "USA")
        {
            for (int i = 0; i < india.Length; i++)
            {
                DropDownList7.Items.Add(usa[i]);
            }
        }
    }
}